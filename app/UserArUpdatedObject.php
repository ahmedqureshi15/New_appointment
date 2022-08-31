<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserArUpdatedObject extends Model
{
    //
    const STATUS_NOT_SHARED = 'not_shared';
    const STATUS_SHARED = 'shared';

    protected $fillable = ['user_id','user_ar_object_key','object'];

    public $timestamps = false;
}
