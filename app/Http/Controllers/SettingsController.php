<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $getObj = Setting::all();
       $onlineAdmin = Setting::all()->where('active','online')->first();
       return response()->json([
        "result" => $getObj,
        "onlineAdmin" => $onlineAdmin
       ],200);

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
        //
        $FormObj = $this->GetForm($request);
        $data = Setting::create($FormObj);

        return response()->json([
            "message" => 'user saved successfully',
            "data" => $data
             
        ],200);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $obj = Setting::find($id); 
        $obj->active = $request->input('active'); 
        $obj->save();
        
        return response()->json([
            'message' => 'Activation UPDATED SUCCESSFULLY',
            'data' => $obj,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GetForm(Request $request)
    {
        return $this->validate($request, [

            "userName"=> ['bail'],
            'waNumber'=> ['bail'],
            'active'=> ['bail'], 
        ]);
    }
}
