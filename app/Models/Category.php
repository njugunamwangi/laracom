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

class Category extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    public const CREATED_AT = null;

    public const UPDATED_AT = null;

    protected $fillable = [
        'category',
        'slug',
        'image_id',
        'parent_id',
        'description'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('category')
            ->saveSlugsTo('slug');
    }

    public function image(): BelongsTo {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function parent(): BelongsTo {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children(): HasMany {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

}
