/*
 * patternizer.js
 * v1.1.0
 * To see what this is capable of, see the UI at patternizer.com
 *
 * Developed by Matthew Lein
 * matthewlein.com
 *
 * Released under the MIT license.
 * Please leave this license and author info intact.
 *
 * Copyright 2017
 */


 var patternizer = {

   supportsCanvas : function() {
     var elem = document.createElement( 'canvas' );
     return !!(elem.getContext && elem.getContext('2d'));
   },

   // nabbed from http://www.hunlock.com/blogs/Mastering_Javascript_Arrays#quickIDX34
   isArray : function(testObject) {
       return testObject && !(testObject.propertyIsEnumerable('length')) && typeof testObject === 'object' && typeof testObject.length === 'number';
   },

   DEGREES_RADIANS : function(degrees) {
     return (degrees * Math.PI / 180);
   },

   HEX_RGBA : function(color, alpha) {

     var r = parseInt(color.substring(1,3),16);
     var g = parseInt(color.substring(3,5),16);
     var b = parseInt(color.substring(5,7),16);
     var a = alpha;

     return 'rgba(' + r + ',' + g + ',' + b + ',' + a + ')';

   },

   normalizeStripes: function(stripes) {
     stripes = stripes.map(function(stripe) {
       if (stripe.mode) {
         stripe.plaid = stripe.plaid || stripe.mode === 'plaid'
         delete stripe.mode;
       }
       return stripe;
     })
     return stripes;
   },

   stripe : function(canvas, options) {

     var stripes = patternizer.normalizeStripes(options.stripes);
     var bgColor = options.bg;

     var ctx = canvas.getContext('2d');
     var cWidth = canvas.width;
     var cHeight = canvas.height;
     var diagLength = Math.sqrt( (cWidth * cWidth) + (cHeight * cHeight) );

     //draw background color
     ctx.fillStyle = bgColor;
     ctx.fillRect( 0, 0, cWidth, cHeight);

     //draw stripes
     for (var j = stripes.length - 1; j >= 0; j--){

       var current = stripes[j],

         opacity = current.opacity / 100 || 0.5,
         color = patternizer.HEX_RGBA( current.color, opacity ),
         plaid = current.plaid || false,
         rotate = current.rotation || 0,
         stripeWidth = current.width,
         offset = current.offset || 0,
         gap = current.gap || stripeWidth,

         tile = stripeWidth + gap,
         repeats = ( (diagLength * 2) + offset ) / tile;

       // rotate
       ctx.rotate( patternizer.DEGREES_RADIANS(rotate) );

       for ( var i=0; i < repeats; i++ ) {

         if ( patternizer.isArray(color) ) {

           var startStripe = (tile * i) + offset,
             endStripe = (tile * i) + offset + stripeWidth,

             lingrad = ctx.createLinearGradient( startStripe, 0, endStripe, 0),

             //get the number of color stops needed
             stopAmount = 1 / (color.length - 1 );

           // put in the color stops evenly across the rectangle
           for (var k=0; k < color.length; k++) {
             lingrad.addColorStop( stopAmount * k , color[k] );
           }

           ctx.fillStyle = lingrad;

         } else {
           // its a plain old string color
           ctx.fillStyle = color;
         }

         // drawing x
         ctx.fillRect( -diagLength + (tile * i) - offset, -diagLength, stripeWidth, diagLength * 2);

         if (plaid) {
             // drawing y
             ctx.fillRect( -diagLength, -diagLength + (tile * i) - offset, diagLength * 2 , stripeWidth);
         }

       }


       //rotate back
       ctx.rotate( -patternizer.DEGREES_RADIANS(rotate) );


     }

   }


 };

 if ( patternizer.supportsCanvas ) {
   // prototype the patternizer method onto canvas
   HTMLCanvasElement.prototype.patternizer = function ( options ) {
     // pass in the canvas and options
     patternizer.stripe( this, options );
     //return for chaining
     return this;
   };
 }

 $(document).ready(function() {

	 var bgCanvas = document.getElementById('bgCanvas');

	 function render() {

			 bgCanvas.patternizer({
					 stripes : [
							 {
									 color: '#4ba894',
									 rotation: 315,
									 opacity: 50,
									 mode: 'normal',
									 width: 21,
									 gap: 27,
									 offset: 0
							 },
							 {
									 color: '#4362a7',
									 rotation: 45,
									 opacity: 70,
									 mode: 'normal',
									 width: 6,
									 gap: 36,
									 offset: 0
							 },
							 {
									 color: '#541c7a',
									 rotation: 0,
									 opacity: 55,
									 mode: 'plaid',
									 width: 30,
									 gap: 30,
									 offset: 0
							 }
					 ],
					 bg : '#ffffff'
			 });

	 }

	 // resize the canvas to the window size
	 function onResize() {

			 // number of pixels of extra canvas drawn
			 var buffer = 100;

			 // if extra canvas size is less than the buffer amount
			 // console.log(bgCanvas);
			 if (bgCanvas.width - window.innerWidth < buffer ||
					 bgCanvas.height - window.innerHeight < buffer) {

					 // resize the canvas to window plus double the buffer
					 bgCanvas.width = window.innerWidth + (buffer * 2);
					 bgCanvas.height = window.innerHeight + (buffer * 2);

					 render();
			 }

	 }

	 function init() {
			 onResize();
	 }
	 init();
 });
