<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawalRequest extends Model
{
    //

    protected $fillable = ['user_id', 'amount', 'status', 'notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
