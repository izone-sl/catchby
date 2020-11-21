<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $getObj = Order::orderBy('id', 'DESC')->with('Product.image')->get();

        $p = Order::orderBy('id', 'DESC')->get();
        $p_count = count($p);
        return response()->json([
            "orders" => $getObj,
            "p_count" => $p_count
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

        // return $FormObj;
        $data = Order::create($FormObj);

        return response()->json([
            'message' => 'ORDER SUCCESSFULLY PLACED',
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
        $obj = Order::find($id); 
        $obj->approval = $request->input('approval'); 
        $obj->save();

        return response()->json([
            'message' => 'ORDER APPROVAL UPDATED SUCCESSFULLY',
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
        $obj = Order::find($id); 
        $obj->delete();

        return response()->json([
            'message' => 'ORDER DELETED SUCCESSFULLY',
            'data' => $obj,
        ],200);
    }

    public function GetForm(Request $request)
    {
        return $this->validate($request, [
            "name"=> ['bail'],
            "address"=> ['bail'],
            "phone"=> ['bail'],
            "email"=> ['bail'], 
            "qty"=> ['bail'],
            "approval"=> ['bail'],
            "product_id"=> ['bail'],
        ]);
    }
}
