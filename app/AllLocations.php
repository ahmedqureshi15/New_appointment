<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllLocations extends Model
{
    //
    protected $fillable = ['id','name','locationCode','countryCode','phoneNumber'];
}
