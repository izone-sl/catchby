<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $getObj = Category::all();
        return response()->json([
            "categories" => $getObj
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
        $data = Category::create($FormObj);

        return response()->json([
            'message' => 'CATEGORY SAVED SUCCESSFULLY',
            'result' => $data
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
        $obj = Category::find($id); 
        $obj->category = $request->input('category'); 
        $obj->save();

        return response()->json([
            'message' => 'CATEGORY UPDATED SUCCESSFULLY',
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
        $obj = Category::find($id); 
        $obj->delete();

        return response()->json([
            'message' => 'CATEGORY DELETED SUCCESSFULLY',
            'data' => $obj,
        ],200);
    }

    public function GetForm(Request $request)
    {
        return $this->validate($request, [
            'category' => ['bail'],
        ]);
    }
}
