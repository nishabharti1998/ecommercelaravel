<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Users;
use DB;
class User extends Controller
{
    //insert registered user data   
    public function insert(Request  $req)
    {
        $first_name = $req->input('first_name');
        $last_name=$req->input('last_name');
        $email=$req->input('email');
        $mob=$req->input('mobile_no');
        
        $password=$req->input('password');
        $hash=md5($password);
        $role_id=3;
        $data=array('firstname'=>$first_name,'lastname'=>$last_name,'email'=>$email,'mobile'=>$mob,
        'password'=>$hash,'role_id'=>$role_id);
        DB::table('usersdetails')->insert($data);
         return response()->json($data);
        // $this->checkemail($email);
         
       
    }
    //
    //token generation
      public function generateRandomString($len) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
        $len=10;
        for ($i = 0; $i < $len; $i++) { 
          $index = rand(0, strlen($characters) - 1); 
          $randomString .= $characters[$index];} 
    
        return $randomString; 
      }
    //
    //save token
    public function inserttoken($user_id)
    {
        $token=$this->generateRandomString(10);
        $u=$user_id;
        $gettoken=array('users_id'=>$u,'token'=>$token);
        $tokendetails= DB::table('token')->insert($gettoken);
        $token=DB::table('token')->where('token',$token);
        $tk=$token->value('token');
          return $tk;
         //return response()->json($tk);
    }
 //
 //check valid logged user
    public  function login_check(Request $req)
      {
       $email=$req->input('email');
       $password=$req->input('password');
       $pwd=md5($password);
       $user=DB::table('usersdetails')->where('email',$email)
       ->where('password',$pwd)->get()->count();
    //   $data=array('email'=>$email,'password'=>$password,'token'=>$token);
      $gettk= DB::table('usersdetails')->where('email',$email)
      ->where('password',$pwd);
      $user_id=$gettk->value('id');
      $role_id=$gettk->value('role_id');
  
        if(($user)==1)
          {
          $token= $this->inserttoken($user_id);
          return response()->json(array('token'=>$token,'role'=>$role_id));
          }
        else
          {
           $status=0;
          return response()->json(array('status'=>$status));
          }
       }
  // public function user_details(Request $req)
  // {
     
  //    $token=$req->header('X-Auth-Token');
  //    $tk=DB::table('token')->where('token',$token);
  //    $uid=$tk->value('users_id');
  //    $getuser=DB::table('usersdetails')->where('id',$uid)->get();
  //     return response()->json($getuser);
  // }

   
}
