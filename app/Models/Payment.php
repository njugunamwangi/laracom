<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
