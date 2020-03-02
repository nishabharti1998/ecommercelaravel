<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'first_name','last_name','mobile_no', 'email', 'password',
    ];
     protected $hidden=[
         'created_at','created_on'
     ];
}
