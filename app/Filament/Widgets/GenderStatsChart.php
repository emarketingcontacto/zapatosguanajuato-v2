<?php

namespace App\Filament\Widgets;

use App\Models\ShoeModel;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GenderStatsChart extends ChartWidget
{
    protected static ?int $sort = 4;
   protected int | string | array $columnSpan = [
    'sm' => 1, // En celular ocupa todo el ancho
    'md' => 1,  // En tablets se ponen 2 por fila
    'xl' => 1,  // En pantallas grandes se ponen los 3 en una fila
];
    protected static ?string $heading = 'Modelos por Genero';

    protected function getData(): array
    {
        // Agrupamos y contamos por el campo 'gender'
        $data = ShoeModel::select('gender', DB::raw('count(*) as total'))
            ->whereNotNull('gender')
            ->groupBy('gender')
            ->pluck('total', 'gender');

        return [
            'datasets' => [
                [
                    'label' => 'Cantidad de Modelos',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => [
                        '#6366f1', // Indigo para Caballero
                        '#ec4899', // Rosa para Dama
                        '#f59e0b', // Ámbar para Niños/as
                        '#10b981', // Verde para Unisex
                    ],
                ],
            ],
            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
