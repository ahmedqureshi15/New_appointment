<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserObjectsData extends Model
{
    //

    const STATUS_NOT_SHARED = 'not_shared';
    const STATUS_SHARED = 'shared';
    protected $fillable = ['Name','Android','IOS','Images'];

    public $timestamps = false;
}
