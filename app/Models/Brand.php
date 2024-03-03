<?php

namespace App\Models;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
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
    use HasSlug;
    use SoftDeletes;

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

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('brand')
            ->saveSlugsTo('slug');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public static function getForm(): array
    {
        return [
            TextInput::make('brand')
                ->required()
                ->maxLength(255),
            TextInput::make('slug')
                ->unique(ignoreRecord: true)
                ->required()
                ->hiddenOn('create')
                ->maxLength(255),
            TextInput::make('website')
                ->url()
                ->unique(ignoreRecord: true)
                ->required()
                ->maxLength(255),
            CuratorPicker::make('featured_image_id')
                ->relationship('featuredImage', 'id')
                ->label('Image'),
            RichEditor::make('description')
                ->columnSpanFull(),
        ];
    }
}
