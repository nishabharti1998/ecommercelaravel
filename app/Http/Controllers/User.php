<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;
use DB;
class User extends Controller
{
   
    public function insert(Request  $req)
    {
        $first_name = $req->input('first_name');
        $last_name=$req->input('last_name');
        $email=$req->input('email');
        $mob=$req->input('mobile_no');
        
        $password=$req->input('password');
        $role_id=1;
     $data=array('firstname'=>$first_name,'lastname'=>$last_name,'email'=>$email,'mobile'=>$mob,
     'password'=>$password,'role_id'=>$role_id);
   DB::table('usersdetails')->insert($data);

       
    }
   
}
