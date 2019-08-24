<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;

use App\Category;
use App\CustomClass\CategoryData;


class BlogController extends Controller
{
    // <=========For Blog==========>
    function show_cat(){
        return view('site_admin.blog')->with([
            'url' => 'cat'
        ]);
    }
    function view_cat(){
        $cats = Category::orderBy('id','desc')->get();
        $cat_datas=CategoryData::getAllData($cats);
        return json_encode($cat_datas);
    }

    function insert_category(Request $request){
        $cat_name=$request->get('cat_name');
        Category::create([
            'cat_name'=> $cat_name
        ]); 
    }

    public function edit_cat($id){       
       $obj=new CategoryData($id);
       return json_encode($obj->getSingleCategoryData());
    }

    public function update_cat(Request $request){
       $update_cat=Category::find($request->get('id'));
       $update_cat->cat_name=$request->get('cat_name');
       $update_cat->update();
       return json_encode(true);
    
    }

    function delete_cat($id){
      $cat_delete = Category::find($id);
      $cat_delete->delete();
    }   
}

