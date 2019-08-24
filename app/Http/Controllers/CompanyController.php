<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\CustomClass\CompanyData;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site_admin.company')->with([
            'url' => 'company'
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
        $company_name = $request->get('name');
        $company_id = Company::create([
            'name' => $company_name,
        ]);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $company = Company::orderBy('id', 'desc')->get();
        $company_datas = CompanyData::getAllData($company);
        return json_encode($company_datas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = new CompanyData($id);
        return json_encode($obj->getSingleCompanyData());
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
        $update_company = Company::find($request->get('id'));
        $update_company->name = $request->get('name');
        $update_company->update();
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
        Company::find($id)->delete();
    }
}
