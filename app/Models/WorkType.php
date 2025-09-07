<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkType extends Model
{
    // use traits
    use SoftDeletes;

    // add fillable
    protected $fillable = [
        'name',
        'unit',
        'price',
        'description',
    ];

    // relationship with work schedule
    public function workSchedules()
    {
        return $this->hasMany(WorkSchedule::class);
    }

    // Casting price ke float untuk hitung
    protected $casts = ['price' => 'float'];

    // add dates
    protected $dates = ['deleted_at'];

    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
