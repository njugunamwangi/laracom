<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Awcodes\Curator\Components\Forms\CuratorPicker;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('retail_price')
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
                            ->preload()
                            ->multiple()
                            ->searchable(),
                        Forms\Components\Select::make('brand_id')
                            ->relationship('brand', 'brand')
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
                Tables\Columns\TextColumn::make('image.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('list_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('retail_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
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
