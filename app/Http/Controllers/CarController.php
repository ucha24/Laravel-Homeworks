<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBy('created_at','DESC')->get();
        return view('pages.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'make'=>'required|max:255',
            'model'=>'required|max:255',
            'license_number'=>'required|max:255',
            'weight'=>'required|max:255',
            'registration_year'=>'required|date_format:Y-m-d',
        ]);

        $data = $request->all();
        Car::Create($data);

        return redirect(route('cars.index'))->with('success','Car Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('pages.edit',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate( [
            'name'=>'required|max:255',
            'make'=>'required|max:255',
            'model'=>'required|max:255',
            'license_number'=>'required|max:255',
            'weight'=>'required|max:255',
            'registration_year'=>'required|date_format:Y-m-d',
        ]);

        $data = $request->all();
        $car->update($data);

        return redirect(route('cars.index'))->with('success','Car Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return back()->with('success','car successfully destroyed');
    }
}
