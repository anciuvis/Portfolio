<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\Tag;


class TagController extends Controller
{
	public function __construct() {
		$this->middleware('admin')->except('index', 'show');
	}

	public function index()
	{
		$tags = Tag::all();
		return view('tags', [
			'tags' => $tags,
		]);
	}
}
