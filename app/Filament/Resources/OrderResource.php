<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\PaymentsRelationManager;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('payment_method')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('payment_status')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('tracking_no')
                    ->required()
                    ->maxLength(2000),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Label')
                    ->tabs([
                        Tabs\Tab::make('Order Summary')
                            ->icon('heroicon-m-home-modern')
                            ->schema([
                                Components\Split::make([
                                    Components\Grid::make(2)
                                        ->schema([
                                            Components\Group::make([
                                                Components\TextEntry::make('user.name')
                                                    ->label('Customer Name'),
                                                Components\TextEntry::make('tracking_no')
                                                    ->label('Tracking Number'),
                                                Components\TextEntry::make('created_at')
                                                    ->date(),

                                            ]),
                                            Components\Group::make([
                                                Components\TextEntry::make('total_price')
                                                    ->money('Kes'),
                                                Components\TextEntry::make('payment_method'),
                                                Components\TextEntry::make('payment_status')
                                                    ->badge()
                                                    ->color(fn (string $state): string => match ($state) {
                                                        'Pending' => 'gray',
                                                        'Processing' => 'warning',
                                                        'Delivered' => 'success',
                                                        'Cancelled' => 'danger',
                                                    }),
                                            ]),
                                        ]),
                                ])->from('lg'),
                            ]),
                        Tabs\Tab::make('Billing Information')
                            ->icon('heroicon-m-adjustments-vertical')
                            ->schema([
                                Components\Split::make([
                                    Components\Grid::make(2)
                                        ->schema([
                                            Components\Group::make([
                                                Components\TextEntry::make('details.name')
                                                    ->label('Name'),
                                                Components\TextEntry::make('details.email')
                                                    ->label('Email'),
                                                Components\TextEntry::make('details.phone')
                                                    ->label('Phone Number'),
                                            ]),
                                            Components\Group::make([
                                                Components\TextEntry::make('details.address1')
                                                    ->label('Address Line 1'),
                                                Components\TextEntry::make('details.address2')
                                                    ->label('Address Line 2'),
                                                Components\TextEntry::make('details.city')
                                                    ->label('City'),
                                                Components\TextEntry::make('details.state')
                                                    ->label('State'),
                                                Components\TextEntry::make('details.zipcode')
                                                    ->label('Zip Code'),
                                            ]),
                                        ]),
                                ])->from('lg'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tracking_no')
                    ->label('Tracking Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->prefix('Kes ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'gray',
                        'Processing' => 'warning',
                        'Delivered' => 'success',
                        'Cancelled' => 'danger',
                    })
                    ->searchable(),
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
            RelationManagers\ItemsRelationManager::class,
            PaymentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
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
