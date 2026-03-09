<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Click;
use Flowframe\Trend\Trend;
//use Flowframe\Trend\TrendValue;

class ClicksChart extends ChartWidget
{
    protected static ?string $heading = 'Rendimiento de Clicks (WhatsApp)';
    protected static ?int $sort = 5;

    protected function getData(): array
    {
        $data = Click::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Clicks de WhatsApp',
                    'data' => $data->pluck('count')->toArray(),
                    'fill' => 'start',
                    'borderColor' => '#25D366',
                    'backgroundColor' => 'rgba(37, 211, 102, 0.1)',
                ],
            ],
            'labels' => $data->pluck('date')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
