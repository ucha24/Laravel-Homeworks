<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addCity(Request $request)
    {
        $request->validate(['name'=>'required']);

        City::create(['name'=>$request->name]);

        return response()->json(['Successfullly Addded']);
    }
}
