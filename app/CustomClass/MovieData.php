<?php


namespace App\CustomClass;

use App\Movie;
use App\Photo;

class MovieData
{

    private $id;
    private $movie_data;

    function __construct($movie_id)
    {
        $movie = Movie::findOrFail($movie_id);
        $this->id = $movie->id;
        $this->setMovieData($movie);
    }

    /**
     * @return mixed
     */
    public function getMovieData()
    {
        $this->movie_data['movie'] 
        = Path::$domain_url . 'movie/video/' . $this->movie_data['movie'];

       $photos= Photo::where('movie_id',$this->id)->get();
        
       $this->movie_data['movie_photo'] = Path::$domain_url . 'movie/photo/' . $photos['0']->image;
    
        $this->movie_data['movie_photos']
            = Path::$domain_url . 'movie/photo/' .$photos;

        // foreach($photos as $photo_each){
        //     return $photo_each->image;
        // }

        return $this->movie_data;
    }

    /**
     * @param mixed $blog_data
     */
    private function setMovieData($movie_data)
    {
        $this->movie_data = $movie_data;
    }
}
  