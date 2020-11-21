<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slideshowpost;

class AdsConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slideShowPosts = Slideshowpost::orderBy('ref', 'ASC')->where('AdsType','slider')->get();
        $slideHome = Slideshowpost::orderBy('ref', 'ASC')->where('AdsType','slider')->get();

        $fixed1 = Slideshowpost::orderBy('id', 'DESC')->where('AdsPosition','fix1')->get();
        $fixed2 = Slideshowpost::orderBy('id', 'DESC')->where('AdsPosition','fix2')->get();
        $fixed3 = Slideshowpost::orderBy('id', 'DESC')->where('AdsPosition','fix3')->get();
        $fixed4 = Slideshowpost::orderBy('id', 'DESC')->where('AdsPosition','fix4')->get();
        $fixed5 = Slideshowpost::orderBy('id', 'DESC')->where('AdsPosition','fix5')->get();
        $fixed6 = Slideshowpost::orderBy('id', 'DESC')->where('AdsPosition','fix6')->get();
        $singleViewBottomPosts = Slideshowpost::orderBy('id', 'DESC')->where('AdsPosition','singleViewBottomPosts')->get();

        return response()->json([ 
            'sliderImages' => $slideShowPosts,
            'slideHome' => $slideHome,
            'fixed1' => $fixed1,
            'fixed2' => $fixed2,
            'fixed3' => $fixed3,
            'fixed4' => $fixed4,
            'fixed5' => $fixed5,
            'fixed6' => $fixed6,
            'singleViewBottomPosts' => $singleViewBottomPosts,
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
      
            $obj = new Slideshowpost;
            $obj->title = $request->input('title'); 
            $obj->AdsPosition = $request->input('AdsPosition'); 
            $obj->AdsType = $request->input('AdsType'); 
            $obj->ref = $request->input('ref'); 
            $obj->active = $request->input('active'); 
    
                $image_string = $request->input('avatar');
                preg_match("/data:image\/(.*?);/",$image_string,$image_extension);
                $image_string = preg_replace('/data:image\/(.*?);base64,/','',$image_string);
                $image_string = str_replace(' ', '+', $image_string); //
                $image_name_string  = 'image_' . rand(10,1000) . '.' . $image_extension[1];
    
                Storage::disk('public')->put($image_name_string ,base64_decode($image_string));
            
            $obj->avatar = $image_name_string;
            $obj->save();
          
      

         
        
 

        return response()->json([
            'message' => 'Advertisement SAVED SUCCESSFULLY',
            'result' => $obj
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
        $obj = Slideshowpost::find($id); 
        $obj->ref = $request->input('ref'); 
        $obj->save();

        return response()->json([
            'message' => 'Ads Ref UPDATED SUCCESSFULLY',
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
        $obj = Slideshowpost::find($id); 
        $obj->delete();

        return response()->json([
            'message' => 'Ads DELETED SUCCESSFULLY',
            'data' => $obj,
        ],200);
    }

    public function GetForm(Request $request)
    {
        return $this->validate($request, [

            "AdsType"=> ['bail'],
            'AdsPosition'=> ['bail'],
            'avatar'=> ['bail'],
            'title' => ['bail'] , 
            'ref'=> ['bail'],
            
        ]);
    }
}
