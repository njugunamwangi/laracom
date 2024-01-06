<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Enums\OrderStatus;
use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrdersStatsOverview;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrdersStatsOverview::class
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'pending' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', OrderStatus::Pending)),
            'Processing' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', OrderStatus::Processing)),
            'Delivered' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', OrderStatus::Delivered)),
            'Cancelled' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', OrderStatus::Cancelled)),
        ];
    }
}
