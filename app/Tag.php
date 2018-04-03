<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public function photostags() {
		return $this->hasMany('App\PhotosTag', 'tag_id', 'id');
	}

}
