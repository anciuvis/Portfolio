<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use App\Tag;

class PhotoController extends Controller
{
	public function __construct() {
		$this->middleware('admin')->except('index', 'show');
	}

	public function index()
	{
		$photos = Photo::all();
		return view('photos', [
			'photos' => $photos,
		]);
	}
}
