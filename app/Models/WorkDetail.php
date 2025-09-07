<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkDetail extends Model
{
    //

    // add fillable
    protected $fillable = [
        'work_schedule_id',
        'worker_id',
        'description',
    ];

    // add dates
    protected $dates = ['deleted_at'];

    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
