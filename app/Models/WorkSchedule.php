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

    protected $fillable = ['status', 'qty', 'leader_id', 'work_type_id'];

    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_id');
    }

    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function workDetails()
    {
        return $this->hasMany(WorkDetail::class);
    }
    public function work_details()
    {
        return $this->hasMany(WorkDetail::class);
    }

    // Accessor untuk total income (qty * price)
    public function getTotalIncomeAttribute()
    {
        return $this->qty * $this->workType->price;
    }

    // Accessor untuk income per worker (dibagi rata)
    public function getIncomePerWorkerAttribute()
    {
        $workerCount = $this->workDetails()->count();  // Use () to get the relation builder and query COUNT(*)
        return $workerCount > 0 ? $this->total_income / $workerCount : 0;
    }

    // add dates
    protected $dates = ['deleted_at'];

    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    protected static function booted()
    {
        static::saved(function ($schedule) {
            if ($schedule->status === 'completed') {
                $schedule->workDetails->each(function ($detail) {
                    $balance = $detail->worker->balance ?? UserBalance::create(['user_id' => $detail->worker_id, 'balance' => 0]);
                    $balance->balance += $detail->income;
                    $balance->save();
                });
            }
        });
    }
}
