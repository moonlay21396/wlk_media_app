<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Star;
use App\Company;
use App\Photo;
use App\Category;
use App\Category_Movie;
use App\Starlist;
use App\CustomClass\MovieData;
use App\CustomClass\PhotoData;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Star::all();
        $company = Company::all();
        $category = Category::all();
        return view('site_admin.movie',compact('stars','company','category'))->with([
            'url' => 'movie'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $category = $request->get('category');

        $file = $request->file('movie');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/movie/video/', $fileName);

        $actor = $request->get('actor');
        $actress = $request->get('actress');
        $director = $request->get('director');
        $running_time = $request->get('running_time');
        $released_year = $request->get('released_year');
        $company = $request->get('company');
        $movie_id = Movie::create([
            'name' => $name,
            'movie' => $fileName,
            'actor' => $actor,
            'actress' => $actress,
            'director' => $director,
            'running_time' => $running_time,
            'released_year' => $released_year,
            'company_id' => $company
        ])->id;

        foreach ($category as $cat_data) {
            Category_Movie::create([
                'category_id' => $cat_data,
                'movie_id' => $movie_id
            ]);
        }

        // Starlist::create([
        //     'name' => ,
        //     'position' => ,
        //     'movie_id' => $movie_id
        // ]);
        // $images = [];
        if ($photo = $request->file('photos')) {
            foreach ($photo as $photo_data){
                $photoName = uniqid() . '_' . $photo_data->getClientOriginalName();
                $photo_data->move(public_path() . '/movie/photo/', $photoName);
                // $images = $photoName;
                Photo::create([
                    'image' => $photoName,
                    'movie_id' => $movie_id
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = new MovieData($id);
        return json_encode($obj->getMovieData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update_movie = Movie::find($request->get('id'));
        $update_movie->name = $request->get('name');
        $update_movie->actor = $request->get('actor');
        $update_movie->actress = $request->get('actress');
        $update_movie->director = $request->get('director');
        $update_movie->running_time = $request->get('running_time');
        $update_movie->released_year = $request->get('released_year');
        $update_movie->company_id = $request->get('company');
        $update_movie->update();

        if ($request->hasFile('movie')) {
            if (file_exists(public_path() . '/movie/video/' . $update_movie->movie)) {
                unlink(public_path() . '/movie/video/' . $update_movie->movie);
            }
            $video = $request->file('movie');
            $video_name = uniqid() . '_' . $video->getClientOriginalName();
            $video->move(public_path('movie/video/'), $video_name);

            $update_movie->movie = $video_name;

            $update_movie->update();
        } else {
            $update_movie->update();
        }

        // if ($request->hasFile('photos')) {
        //     if (file_exists(public_path() . '/movie/photo/' . $update_movie->movie_photo)) {
        //         unlink(public_path() . '/movie/photo/' . $update_movie->movie_photo);
        //     }
        //     $photo = $request->file('photos');
        //     $photo_name = uniqid() . '_' . $photo->getClientOriginalName();
        //     $photo->move(public_path('movie/photo/'), $photo_name);

        //     $update_movie->movie_photo = $photo_name;

        //     $update_movie->update();
        // } else {
        //     $update_movie->update();
        // }
        return json_encode(true);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::find($id)->delete();
        Photo::where('movie_id',$id)->delete();
    }
    public function view_movie(){
        $movie = Movie::orderBy('created_at', 'Desc')->get();

        $movie_arr = array();
        foreach ($movie as $movie_data) {
            $obj = new MovieData($movie_data->id);
            array_push($movie_arr, $obj->getMovieData());
        }
        // $photo = Photo::orderBy('created_at', 'Desc')->get();

        // $photo_arr = array();
        // foreach($photo as $photo_data){
        //     $obj1 = new PhotoData($photo_data->id);
        //     array_push($photo_arr, $obj1->getPhotoData());
        // }
        return response()->json($movie_arr);
        
    }
    public function movie_detail(){
        $movies = Movie::orderBy('id','desc')->get();
        foreach($movies as $movie_data){
            $movies_data = new MovieData($movie_data->id);
            $movie_detail = $movies_data->getMovieData();
        }
        return view('site_admin.movie_detail')->with([
            'url' => 'movie',
            'movie_detail' => $movie_detail
        ]);     
    }
}
