<?php

namespace App\CustomClass;

use App\Company;

class CompanyData
{

    private $id;
    private $name;

    public function __construct($company_id)
    {
        $company = Company::where('id', $company_id)->firstOrFail();
        $this->setId($company->id);
        $this->setName($company->name);
    }

    public function getSingleCompanyData()
    {
        return $arr = [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }

    public static function getAllData($company_datas)
    {
        $arr = [];
        foreach ($company_datas as $data) {
            $obj = new CompanyData($data->id);
            array_push($arr, $obj->getSingleCompanyData());
        }
        return $arr;
    }

    private function setId($id)
    {
        $this->id = $id;
    }

    private function setName($company_name)
    {
        $this->name = $company_name;
    }


    private function getId()
    {
        return $this->id;
    }

    private function getName()
    {
        return $this->name;
    }

}