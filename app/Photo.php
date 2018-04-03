<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Photo extends Model
{
	public function photostags() {
		return $this->hasMany('App\PhotosTag', 'photo_id', 'id');
	}
}
