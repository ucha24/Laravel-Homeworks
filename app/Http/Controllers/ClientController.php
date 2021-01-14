<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('pages.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  \Validator::make($request->all(),[
            'name'=>'required',
            'age'=>'required|numeric',
            'city_id'=>'required'
        ]);
        if ($validator->fails()) {
            if($request->ajax()){
                return response()->json(['errors'=>$validator->errors(),'status'=>false]);
            }
        }

        $data = $request->only(['name','age','city_id']);

        $data['status'] = $request->status?1:0;

        Client::create($data);
        if($request->ajax()){
            return response()->json(['status'=>true,'message'=>'successfully added']);   
           }
        return redirect(route('clients.index'))->with('success','Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        
        return view('pages.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validator =  \Validator::make($request->all(),[
            'name'=>'required',
            'age'=>'required|numeric',
            'city_id'=>'required'
        ]);
        if ($validator->fails()) {
            if($request->ajax()){
                return response()->json(['errors'=>$validator->errors()]);
            }
        }
        
        
        $data = $request->only(['name','age','city_id']);

        $data['status'] = $request->status?1:0;

        $client->update($data);

        if($request->ajax()){
         return response()->json(['status'=>true,'message'=>'successfully updated']);   
        }
        return back()->with('success','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client,Request $request)
    {
        $client->delete();

        if($request->ajax()){
            return response()->json(['status'=>true,"message"=>"client deleted"]);
        }
        return back()->with('success','deleted');
    }
}
