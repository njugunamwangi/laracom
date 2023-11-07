<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'tracking_no',
        'total_price',
        'payment_method',
        'payment_status',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items(): HasMany {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function details(): HasOne {
        return $this->hasOne(OrderDetail::class, 'order_id', 'id');
    }
}
