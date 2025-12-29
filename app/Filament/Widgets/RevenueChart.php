<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RevenueChart extends ChartWidget
{
    protected static ?string $heading = 'Revenue Last 30 Days';
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = \App\Models\Order::selectRaw('DATE(created_at) as date, SUM(total_price) as aggregate')
            ->whereDate('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Revenue (GHS)',
                    'data' => $data->map(fn($row) => $row->aggregate)->toArray(),
                    'borderColor' => '#14b8a6', // teal-500
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(20, 184, 166, 0.1)',
                ],
            ],
            'labels' => $data->map(fn($row) => $row->date)->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
