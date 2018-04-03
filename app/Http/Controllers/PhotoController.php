<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Tag;
use App\PhotosTag;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
		public function __construct() {
			$this->middleware('admin')->except('index', 'show');
		}

		/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$photos = Photo::all();
			$tags = [];
			foreach ($photos as $photo) {
				$photostags = Photostag::where('photo_id', $photo->id)->get();
				$tags[$photo->id] = [];
				foreach ($photostags as $photostag) {
					$tags[$photo->id][] = Tag::where('id', $photostag->tag_id)->get();
				}
			}
			// dd($tags);
			return view('photos', [
				'photos' => $photos,
				'photos_tags' => $tags,
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$tags = Tag::all();
      return view('photo/create', [
				'tags' => $tags,
			]);

    }

		private function validation(Request $request) {
			$request->validate([
				'title' 				=> 'required|max:300',
				'description' 	=> 'required|max:3000',
				'img_url' 		=> 'required|mimes:jpeg,bmp,png|max:500',
			], [
				'title.required' 				=> 'Antrastes laukelis yra privalomas',
				'description.required' 	=> 'Aprasymo laukelis yra privalomas',
				'img_url.required' 		=> 'Nuotrauka yra privaloma',
			]);
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$this->validation($request);
			// i storage/app ikelia default, tolimesni kelia rnurodome
			$path = $request->file('img_url')->store('public/photos');
			// public/dishes/*****
			// reikia dar php artisan storage:link irasyti, dirbant su storagu - sukuria SYMLINKa
			$path = str_replace('public', '/storage', $path);

			$photo = new Photo();
			$photo->title = $request->title;
			$photo->description = $request->description;
			$photo->img_url = $path;
			// $request->image_url pakeisti i $path kad butu failo ikelimas i duombaze
			$photo->save();

			foreach ($request->tags as $id) {
				$phototag = new Photostag();
				$phototag->tag_id = $id;
				$phototag->photo_id = $photo->id;
				$phototag->save();
			}
			return redirect()->route('photos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
			$photo = Photo::findOrFail($request->id);
			return view('photo/show', [
				'photo' => $photo,
			]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
			$tags = Tag::all();

			$photostags = Photostag::where('photo_id', $photo->id)->get();
			$currenttags = [];
			foreach ($photostags as $photostag) {
				$currenttags[] = Tag::where('id', $photostag->tag_id)->get();
			}
			return view('photo/edit', [
				'photo' => $photo,
				'currenttags' => $currenttags,
				'tags' => $tags,
			]);
    }


			public function imageDelete($url) {
				$oldPath = str_replace('storage', '/public', $url);
				Storage::delete($oldPath);
			}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
			// $photo = Photo::find($request->id); // sito reikia jeigu web.php routuose nurodyta su {id} - kitaip {dish} ir veiks su Dish $dish
			$rules = [
				'title'  => 'required|min:3',
				'description' => 'required',
			];
			if ($request->file('img_url')) {

				$rules['img_url'] = 'mimes:jpeg,bmp,png|max:900';

				$this->validate($request, $rules);

				$this->imageDelete($photo->img_url);

				$path = $request->file('img_url')->store('public/photos');
				$path = str_replace('public', '/storage', $path);
			} else {
				$this->validate($request, $rules);
				$path = $photo->img_url;
			}
			$photo->title = $request->title;
			$photo->img_url = $path;
			$photo->description = $request->description;
			$photo->save();

			foreach ($request->tags as $id) {
				$phototag = new Photostag();
				$phototag->tag_id = $id;
				$phototag->photo_id = $photo->id;
				$phototag->save();
			}

			$tags = Tag::all();
			return view('photo/edit', [
				'photo' => $photo,
				'tags' => $tags,
			]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
