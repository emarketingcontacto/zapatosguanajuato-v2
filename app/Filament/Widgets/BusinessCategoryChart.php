<?php

namespace App\Filament\Widgets;

use App\Models\Business;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BusinessCategoryChart extends ChartWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = [
    'sm' => 1, // En celular ocupa todo el ancho
    'md' => 1,  // En tablets se ponen 2 por fila
    'xl' => 1,  // En pantallas grandes se ponen los 3 en una fila
];
    protected static ?string $heading = 'Negocios por Categoría';


    protected function getData(): array
    {
        // Contamos cuántos negocios pertenecen a cada categoría
        $data = Business::join('categories', 'businesses.category_id', '=', 'categories.id')
            ->select('categories.name', DB::raw('count(*) as total'))
            ->groupBy('categories.name')
            ->pluck('total', 'name');

        return [
            'datasets' => [
                [
                    'label' => 'Cantidad de Negocios',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => [
                        '#8b5cf6', // Violeta (Fabricantes)
                        '#06b6d4', // Cian (Mayoristas)
                        '#f97316', // Naranja (Minoristas)
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

    protected function getOptions(): array {
        return [
            'indexAxis' => 'y', // <--- Esta es la "magia" para que sean horizontales
            'scales' => [
                'x' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
}
