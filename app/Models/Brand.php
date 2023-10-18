<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = [
        'brand',
        'slug',
        'website',
        'featured_image_id',
        'description',
    ];

    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('brand')
            ->saveSlugsTo('slug');
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

}
