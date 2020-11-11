<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at','DESC')->get();
        return view('pages.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'name'=>'required|max:255',
            'code'=>'required|max:255',
            'address'=>'required|max:255',
            'city'=>'required|max:255',
            'country'=>'required|max:255',
        ]);

        $data = $request->all();
        Company::create($data);

        return redirect(route('companies.index'))->with('success','company Successfully Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('pages.companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate( [
            'name'=>'required|max:255',
            'code'=>'required|max:255',
            'address'=>'required|max:255',
            'city'=>'required|max:255',
            'country'=>'required|max:255',
        ]);

        $data = $request->all();
        $company->update($data);

        return redirect(route('companies.index'))->with('success','company Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back()->with('success','company successfully destroyed');
    }
}
