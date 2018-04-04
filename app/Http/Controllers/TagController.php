<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Photo;
use App\PhotosTag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

		public function __construct() {
 			$this->middleware('admin')->except('show');
 		}

    public function index()
    {
      $tags = Tag::all();
			return view('tags', [
				'tags' => $tags,
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return view('tag/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
		 private function validation(Request $request) {
			$request->validate([
				'title' 				=> 'required|max:300',
			], [
				'title.required' 				=> 'Antrastes laukelis yra privalomas',
			]);
			}

    public function store(Request $request)
    {
			$this->validation($request);
			$tag = new Tag();
			$tag->title = $request->title;
			$tag->save();
			return redirect()->route('photos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
			$tags = Tag::all()->keyBy('id');
			$photos = $photo_ids = $tags_ids = [];
			$photostags = Photostag::where('tag_id', $tag->id)->get();
			//$photos[$tag->id] = [];
			foreach ($photostags as $photostag) {
				$photo_ids[] = $photostag->photo_id;
			}

			$photos = Photo::whereIn('id', $photo_ids)->get()->keyBy('id')->toArray();
			$all_photostags = Photostag::whereIn('photo_id', $photo_ids)->get()->toArray();

			foreach ($all_photostags as $p_tag) {
				$photos[$p_tag['photo_id']]['tags'][] = $p_tag['tag_id'];
			}

			// dd($photos);


			return view('tag/show', [
				'tags' => $tags,
				'photos' => $photos,
				'currenttag' => $tag,
			]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
			return view('tag/edit', [
				'tag' => $tag,
			]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
			$this->validation($request);
			$tag->title = $request->title;
			$tag->save();
			return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
			$tag->delete();
			return redirect()->route('tags.index');
    }
}
