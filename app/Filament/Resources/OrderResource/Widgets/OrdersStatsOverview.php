<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Enums\PaymentStatus;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrdersStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', Order::count())
                ->icon('heroicon-o-shopping-bag')
                ->description('Total number of orders'),
            Stat::make('Total Amount', Order::sum('total_price'))
                ->icon('heroicon-o-credit-card')
                ->description('Total amount payable'),
            Stat::make('Total Revenue', Order::query()
                ->where('payment_status', PaymentStatus::Paid)
                ->sum('total_price'))
                ->icon('heroicon-o-banknotes')
                ->description('Total amount paid'),
        ];
    }
}
