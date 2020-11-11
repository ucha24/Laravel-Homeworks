<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{ 
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $employees = Employee::orderBy('created_at','DESC')->get();
       return view('pages.employees.index',compact('employees'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('pages.employees.create');
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
            'lastname'=>'required|max:255',
            'birthdate'=>'required|date',
            'personal_id'=>'required|numeric|max:99999999999',
            'salary'=>'required|numeric|max:1000000',
       ]);

       $data = $request->all();
       $data['created_at'] = time();
       $data['updated_at'] = time();
       Employee::create($data);

       return redirect(route('employees.index'))->with('success','employee Successfully Added');
   }


   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Employee  $employee
    * @return \Illuminate\Http\Response
    */
   public function edit(Employee $employee)
   {
       return view('pages.employees.edit',compact('employee'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Employee  $employee
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Employee $employee)
   {
       $request->validate( [
           'name'=>'required|max:255',
           'lastname'=>'required|max:255',
           'birthdate'=>'required|date',
           'personal_id'=>'required|numeric|max:99999999999',
           'salary'=>'required|numeric|max:1000000',
       ]);

       $data = $request->all();
       $data['updated_at'] = time();
       $employee->update($data);

       return redirect(route('employees.index'))->with('success','employee Successfully Updated');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Employee  $employee
    * @return \Illuminate\Http\Response
    */
   public function destroy(Employee $employee)
   {
       $employee->delete();
       return back()->with('success','employee successfully destroyed');
   }
}
