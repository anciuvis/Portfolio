<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public function photos() {
		return $this->belongsToMany('App\Photo', 'photos_tags', 'tag_id', 'photo_id');
	}

}
