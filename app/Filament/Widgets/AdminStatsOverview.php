<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Permission;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalAdmins = User::whereIn('role', ['admin', 'superadmin'])->count();
        $totalSuperAdmins = User::where('role', 'superadmin')->count();
        $totalPermissions = Permission::count();
        
        return [
            Stat::make('Total Admin', $totalAdmins)
                ->description('Jumlah total admin dan superadmin')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
            Stat::make('Super Admin', $totalSuperAdmins)
                ->description('Jumlah super admin')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('warning'),
            Stat::make('Hak Akses', $totalPermissions)
                ->description('Total pengaturan hak akses')
                ->descriptionIcon('heroicon-m-lock-closed')
                ->color('info'),
        ];
    }
}
