<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('product')
                                    ->required()
                                    ->maxLength(2000),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->hiddenOn('create')
                                    ->maxLength(2000),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('model_name')
                                    ->maxLength(2000),
                                Forms\Components\TextInput::make('model_number')
                                    ->maxLength(2000),
                            ]),
                        Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('list_price')
                                    ->prefix('Kes')
                                    ->required()
                                    ->gt('retail_price')

                                    ->numeric(),
                                Forms\Components\TextInput::make('retail_price')
                                    ->prefix('Kes')
                                    ->required()
                                    ->numeric(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(2000),
                                Forms\Components\TextInput::make('meta_description')
                                    ->maxLength(2000),
                            ]),
                        Grid::make(1)
                            ->schema([
                                Forms\Components\Toggle::make('status')
                                    ->label('Published')
                                    ->required(),
                            ]),
                        Forms\Components\RichEditor::make('warranty')
                            ->columnSpanFull(),
                    ])->columnSpan(8),
                Section::make()
                    ->schema([
                        CuratorPicker::make('image_id')
                            ->relationship('image', 'name')
                            ->label('Image')
                            ->required(),
                        Forms\Components\Select::make('category_id')
                            ->relationship('categories', 'category')
                            ->required()
                            ->createOptionForm(Category::getForm())
                            ->preload()
                            ->multiple()
                            ->searchable(),
                        Forms\Components\Select::make('brand_id')
                            ->relationship('brand', 'brand')
                            ->options(Brand::all()
                                ->pluck('brand', 'id')
                            )
                            ->createOptionForm(Brand::getForm())
                            ->editOptionForm(Brand::getForm())
                            ->required()
                            ->preload()
                            ->searchable(),
                    ])->columnSpan(4),
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image_id')
                    ->label('Image')
                    ->height(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('product')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand.brand')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('model_name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('model_number')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('list_price')
                    ->prefix('Kes ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('retail_price')
                    ->prefix('Kes ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_by')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_by')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_by')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
