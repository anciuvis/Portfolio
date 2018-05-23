<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Photo extends Model
{
	public function tags() {
		return $this->belongsToMany('App\Tag', 'photos_tags', 'photo_id', 'tag_id');
	}
}
