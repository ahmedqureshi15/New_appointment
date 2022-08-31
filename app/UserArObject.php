<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserArObject extends Model
{

    const STATUS_NOT_SHARED = 'not_shared';
    const STATUS_SHARED = 'shared';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','branch_url','ar_object_id','user_ar_object_key','old_user_id','share_status'];


    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-m-d h:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-m-d h:i:s');
    }

}
