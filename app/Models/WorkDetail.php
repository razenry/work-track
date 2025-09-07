<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class WorkDetail extends Model
{
    //
    use HasUuids;

    // add fillable
    protected $fillable = ['work_schedule_id', 'worker_id', 'description'];

    public function workSchedule()
    {
        return $this->belongsTo(WorkSchedule::class);
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    // Accessor untuk income worker ini
    public function getIncomeAttribute()
    {
        return $this->workSchedule->income_per_worker;
    }

    // add dates
    protected $dates = ['deleted_at'];

    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
