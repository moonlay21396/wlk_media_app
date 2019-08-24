<?php

namespace App\CustomClass;
use App\Category;

class CategoryData{

	private $id;
	private $cat_name;

	public function __construct($cat_id){
		$cats=Category::where('id',$cat_id)->firstOrFail();
		$this->setId($cats->id);
		$this->setName($cats->cat_name);
	}	

	public function getSingleCategoryData(){
		return $arr=[
			'id' => $this->getId(),
			'name' => $this->getName()
		];
	}

	public static function getAllData($cat_datas){
		$arr=[];
		foreach($cat_datas as $data){
			$obj=new CategoryData($data->id);
			array_push($arr,$obj->getSingleCategoryData());
		}

		return $arr;
	}

	private function setId($id){
		$this->id=$id;
	}

	private function setName($cat_name){
		$this->cat_name=$cat_name;
	}


	private function getId(){
		return $this->id;
	}

	private function getName(){
		return $this->cat_name;
	}

}