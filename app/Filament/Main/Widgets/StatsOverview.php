<?php

namespace App\Filament\Main\Widgets;

use App\Models\Acquisition;
use App\Models\Asset;
use App\Models\Disposal;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Assets', Asset::all()->count())
                ->description('Number of assets')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Acquistions', Acquisition::all()->count())
                ->description('number of acquistions')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('warning'),
            Stat::make('Disposals', Disposal::all()->count())
                ->description('Number of disposals')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('danger'),
        ];
    }
}
