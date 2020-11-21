<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        
        $getObj = Product::orderBy('id', 'DESC')->with('Image')->where('approvedStatus','=','approved')->get();
        $getObj_customer = Product::orderBy('id', 'DESC')->with('Image')->orderBy('id', 'DESC')->where('postedBy','!=','admin')->get();
        
       $deliveryObj = Product::take(10)->orderBy('id', 'DESC')->with('Image')->where('category','=','24 Hours Essentials')->get();
       $mobileAccessoriesObj = Product::take(10)->orderBy('id', 'DESC')->with('Image')->where('category','=','Mobile accessories')->get();
       $computerAccessoriesObj = Product::take(10)->orderBy('id', 'DESC')->with('Image')->where('category','=','Computer accessories')->get();
       $kitchenEquipmentsObj = Product::take(10)->orderBy('id', 'DESC')->with('Image')->where('category','=','Kitchen Equipments')->get();
       $wristwatchesObj = Product::take(10)->orderBy('id', 'DESC')->with('Image')->where('category','=','Wrist watches')->get();
       $healthandBeautyObj = Product::take(10)->orderBy('id', 'DESC')->with('Image')->where('category','=','Health and Beauty')->get();
       $offeredProductObj = Product::take(10)->orderBy('id', 'DESC')->with('Image')->where('category','=','Offered Products')->get();
         
       $p = Product::orderBy('id', 'DESC')->get();
       $p_count = count($p);

        
        
        return response()->json([
            "customer_posted_products" => $getObj_customer,
            "all_products" => $getObj,
            "delivery_obj" => $deliveryObj,
            "mobileAccessories_obj" => $mobileAccessoriesObj,
            "computerAccessories_obj" => $computerAccessoriesObj,
            "kitchenEquipments_obj" => $kitchenEquipmentsObj,
            "wristwatches_obj" => $wristwatchesObj,
            "healthandBeauty_obj" => $healthandBeautyObj,
            "offeredProduct_obj" => $offeredProductObj,
            "p_count" => $p_count,
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
        $data = Product::create($FormObj);

                 

        $getID = Product::orderBy('id','DESC')->first(); 
        
        $img_store_all = $request->input('subImg');
        $file = $img_store_all;
        
        for ($x=0; $x < count($img_store_all); $x++) { 
            $fileArray = $file[$x];
            $image_string = $fileArray;
            preg_match("/data:image\/(.*?);/",$image_string,$image_extension);
            $image_string = preg_replace('/data:image\/(.*?);base64,/','',$image_string);
            $image_string = str_replace(' ', '+', $image_string); //
            $image_name_string  = 'image_' . rand(10,1000) . '.' . $image_extension[1];

            Storage::disk('public')->put($image_name_string ,base64_decode($image_string));

            
            $img = new Image;
            $img->product_id = $getID['id'];
            $img->img = $image_name_string;
            $img->save();
           
            

        }
        

        
       
       

        // return count($arr_img);
        // return $arr_img;

        return response()->json([
            'message' => 'PRODUCT SAVED SUCCESSFULLY',
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
        $obj = Product::find($id); 
        $obj->name = $request->input('name'); 
        $obj->price = $request->input('price'); 
        $obj->description = $request->input('description'); 
        $obj->category = $request->input('category'); 
        $obj->postedBy = $request->input('postedBy'); 
        $obj->contact = $request->input('contact'); 
        $obj->contactMail = $request->input('contactMail'); 
        $obj->waLink = $request->input('waLink'); 
        $obj->approvedStatus = $request->input('approvedStatus');   

        $obj->save();


       

        return response()->json([
            'message' => 'PRODUCT UPDATED SUCCESSFULLY',
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
        $obj = Product::find($id); 
        $obj->delete();

        return response()->json([
            'message' => 'PRODUCT DELETED SUCCESSFULLY',
            'data' => $obj,
        ],200);
    }

    public function GetForm(Request $request)
    {
        return $this->validate($request, [

            "name"=> ['bail'],
            'price'=> ['bail'],
            'description'=> ['bail'],
            'category' => ['bail'] , 
            'postedBy'=> ['bail'],
            'contactMail'=> ['bail'],
            'contact'=> ['bail'],
            'waLink'=> ['bail'],
            'approvedStatus'=> ['bail'], 
        ]);
    }
}
