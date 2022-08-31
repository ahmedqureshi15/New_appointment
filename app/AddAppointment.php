<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddAppointment extends Model
{
    //
    protected $fillable = ['location_id','email','phone_number','date_of_appoinment'];
}
