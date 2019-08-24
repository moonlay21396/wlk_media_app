<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\Star;
use App\StarPosition;
use App\CustomClass\StarData;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = Position::all();

        return view('site_admin.star')->with([
            'url'=>'star',
            'position'=>$position
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $star_name = $request->get('star_name');
        $position = $request->get('position');
        $star_id = Star::create([
            'name' => $star_name,
        ])->id;
        foreach ($position as $position_data) {
            StarPosition::create([
                'position_id'=>$position_data,
                'star_id'=>$star_id
            ]);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = new StarData($id);
        return json_encode($obj->getStarsData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        Star::find($id)->delete();
        StarPosition::where('star_id',$id)->delete();

    }

    public function get_all_star(){
        $star_list = Star::orderBy('id','desc')->get();
        $arr=[];
        foreach ($star_list as $data) {
            $stars_data = new StarData($data->id);
            array_push($arr, $stars_data->getStarsData());
        }
        return json_encode($arr);
    }
}
