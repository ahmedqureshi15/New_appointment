<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_push_token extends Model
{
    //
    protected $fillable = ['email','password','device_type','push_token'];
    public $timestamps = false;
}
