<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSchedule extends Model
{
    // use traits
    use SoftDeletes, HasUuids;

    // add fillable
    protected $fillable = [
        'status',
        'qty',
        'leader_id',
        'work_type_id',
    ];

    // add dates
    protected $dates = ['deleted_at'];

    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
