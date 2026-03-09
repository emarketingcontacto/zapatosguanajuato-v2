<?php

namespace App\Filament\Widgets;

use App\Models\Business;
use App\Models\Click;
use App\Models\ShoeModel;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            Stat::make('Total de Negocios', Business::count())
                ->description('Proveedores Registrados')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('success'),

            Stat::make('Modelos de Calzado', ShoeModel::count())
                ->description('Total de productos registrados')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('info'),

            Stat::make('Precio Promedio', '$' . number_format(ShoeModel::avg('price'), 2))
                ->description('Costo medio por par')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),

                // 2. Nueva Tarjeta de Valor para el Cliente
            Stat::make('Prospectos (WhatsApp)', Click::count())
                ->description('Clicks totales en contacto')
                ->descriptionIcon('heroicon-m-cursor-arrow-rays')
                ->chart([7, 2, 10, 3, 15, 4, 17]) // Esto dibuja una pequeña gráfica debajo del número
                ->color('success'),
        ];
    }
}
