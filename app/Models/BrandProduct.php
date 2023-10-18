<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    use HasFactory;

    protected $table = 'brand_product';

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = [
        'brand_id',
        'product_id'
    ];
}
