<?php

namespace App\Filament\Widgets;

use App\Models\ShoeModel;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ShoeModelsChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = [
    'sm' => 1, // En celular ocupa todo el ancho
    'md' => 1,  // En tablets se ponen 2 por fila
    'xl' => 1,  // En pantallas grandes se ponen los 3 en una fila
];

    protected static ?string $heading = 'Total Modelos por Subcategoria';

    protected function getData(): array
    {
        // Consultamos la base de datos agrupando por el nombre de la subcategoría
        $data = ShoeModel::join('subcategories', 'shoe_models.subcategory_id', '=', 'subcategories.id')
            ->select('subcategories.name', DB::raw('count(*) as total'))
            ->groupBy('subcategories.name')
            ->pluck('total', 'name');

        return [
            'datasets' => [
                [
                    'label' => 'Modelos',
                    'data' => $data->values()->toArray(),
                    // Colores para las rebanadas del pastel
                    'backgroundColor' => [
                        '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                    ],
                ],
            ],
            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
