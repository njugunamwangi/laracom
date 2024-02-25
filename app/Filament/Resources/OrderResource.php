<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\PaymentsRelationManager;
use App\Filament\Resources\OrderResource\Widgets\OrdersStatsOverview;
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

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('total_price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('payment_method')
                    ->required()
                    ->maxLength(45),
                Forms\Components\Select::make('payment_status')
                    ->enum(PaymentStatus::class)
                    ->options(PaymentStatus::class)
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('tracking_no')
                    ->required()
                    ->maxLength(2000),
                Forms\Components\Select::make('order_status')
                    ->enum(OrderStatus::class)
                    ->options(OrderStatus::class)
                    ->searchable()
                    ->required(),
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
                                                Components\TextEntry::make('order_id')
                                                    ->label('Order ID'),
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
                                                        'Not Paid' => 'gray',
                                                        'Failed' => 'warning',
                                                        'Paid' => 'success',
                                                        'Pending' => 'danger',
                                                    }),
                                                Components\TextEntry::make('order_status')
                                                    ->badge()
                                                    ->color(fn (string $state): string => match ($state) {
                                                        'Pending' => 'gray',
                                                        'Failed' => 'warning',
                                                        'Processing' => 'info',
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
                Tables\Columns\TextColumn::make('order_status')
                    ->badge()
                    ->color(function ($state) {
                        return $state->getColor();
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->badge()
                    ->color(function ($state) {
                        return $state->getColor();
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

    public static function getWidgets(): array
    {
        return [
            OrdersStatsOverview::class
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
