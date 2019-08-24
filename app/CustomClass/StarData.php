<?php


namespace App\CustomClass;

use App\Star;
use App\StarPosition;
use App\Position;

class StarData
{

    private $id;
    private $stars_data;

    function __construct($stars_id)
    {
        $stars = Star::where('id', $stars_id)->first();
        $this->id = $stars->id;
        $this->setStarsData($stars);
    }

    /**
     * @return mixed
     */
    public function getStarsData()
    {
        // $course_id = $this->students_data['course_id'];
        // $course = Course::findOrFail($course_id);
        // $this->students_data['course_name'] = $course->name;
        // $this->students_data['course_price'] = $course->price;

        $stars_id = $this->stars_data['id'];
        $star_id = StarPosition::where('star_id', $stars_id)->get();
        $star_arr = [];
        foreach ($star_id as $data) {
            $position = $data->position_id;
            $positons = Position::where('id', $position)->get();
            array_push($star_arr, $positons['0']->name);
        }
        $this->stars_data['position'] = $star_arr;

        // $sport_id = Student_sport::where('s_id', $students_id)->get();
        // $sport_arr = [];
        // foreach ($sport_id as $data) {
        //     $sport = $data->sport_id;
        //     $sports = Sport::where('sport_id', $sport)->get();
        //     array_push($sport_arr, $sports);
        // }
        // $this->students_data['sport'] = $sport_arr;

        return $this->stars_data;
    }

    /**
     * @param mixed $blog_data
     */
    private function setStarsData($stars_data)
    {
        $this->stars_data = $stars_data;
    }





}
