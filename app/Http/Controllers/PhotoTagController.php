<?php

namespace App\Http\Controllers;

use App\PhotoTag;
use Illuminate\Http\Request;

class PhotoTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

		public function __construct() {
 			$this->middleware('admin')->except('index', 'show');
 		}

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhotoTag  $photoTag
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoTag $photoTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhotoTag  $photoTag
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoTag $photoTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhotoTag  $photoTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoTag $photoTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhotoTag  $photoTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoTag $photoTag)
    {
        //
    }
}
