<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Revenue', 'GHS ' . number_format(\App\Models\Order::sum('total_price'), 2))
                ->description('Total earnings from orders')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Pending Orders', \App\Models\Order::where('status', 'pending')->count())
                ->description('Orders waiting for processing')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('Low Stock Products', \App\Models\Product::where('stock', '<', 10)->count())
                ->description('Products needing restock')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger'),
            Stat::make('Unread Messages', \App\Models\ContactMessage::whereNull('read_at')->count())
                ->description('Messages requiring attention')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary'),
        ];
    }
}
