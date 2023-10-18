<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'category_product';

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = [
        'category_id',
        'product_id'
    ];
}
