<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function insert(Request $request){
//        Event::create($request->all());
//        if ($request->hasFile('photo')){
//            $file=$request->file('photo');
//            $image_name=uniqid().'_'.$file->getClientOriginalName();
//            $file->move(public_path().'/upload/event/',$image_name);
//        }
//        return 'success';
//        return $request->all();
        return 'aAAAA';
    }
}
