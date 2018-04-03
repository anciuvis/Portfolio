<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToPhotosTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
		 public function up()
		 {
		 	Schema::table('photos_tags', function (Blueprint $table) {
		 		$table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
		 		$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		 	});
		 }

		 /**
		  * Reverse the migrations.
		  *
		  * @return void
		  */
		 public function down()
		 {
		 	Schema::table('photos_tags', function (Blueprint $table) {
		 		$table->dropForeign('photos_tags_photo_id_foreign');
		 		$table->dropForeign('photos_tags_tag_id_foreign');
		 	});
		 }
}
