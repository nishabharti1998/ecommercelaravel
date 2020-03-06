<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class product extends Controller
{
    //Insert Product data
    public function insert_data(Request  $req)
    {
        $pid = $req->input('pid');
        $cid=$req->input('cid');
        $name=$req->input('name');
        $price=$req->input('price');
        $qnt=$req->input('qnt');
        $data=array('product_id'=>$pid,'category'=>$cid,'productname'=>$name,'price'=>$price,
        'quantity'=>$qnt);
        $getdata= DB::table('product')->insert($data);
  
         return response()->json("product added successfully");
       
    }
    //
    //View product data
    public function view()
    {
        $product_data=DB::table('product')->select('*')->get();
        return response()->json($product_data);
    }
    //
    //view product by user
    public function userview()
    {
        $product_data=DB::table('product')->select('product_id','productname','price','quantity')->get();
        return response()->json($product_data);
         
    
    }
    
    
}
