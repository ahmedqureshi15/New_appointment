<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableAppointments extends Model
{
    //

    protected $fillable = ['locationId','startTimestamp','endTimestamp','active','duration','remoteInd'];


}
