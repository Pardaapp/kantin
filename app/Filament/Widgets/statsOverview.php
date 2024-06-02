<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class statsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $unshippedOrders = Order::where('status', '!=', 'completed')->count();
        $totalSales = Order::where('status', 'completed')->sum('total');
        $totalSalesLast30Days = Order::where('status', 'completed')->where('created_at', '>=', now()->subDays(30))->sum('total');
        return [
            Card::make('30 Hari Terakhir', 'Rp'.$totalSalesLast30Days)
            ->description('Total penjualan untuk 30 hari terakhir')
            ->color('success')
            ->icon('heroicon-o-currency-dollar'),
            Card::make('Total Penjualan', 'Rp'.$totalSales)
            ->description('Total pendapatan dari order yang selesai')
            ->color('success')
            ->icon('heroicon-o-currency-dollar'),
            Card::make('Order Belum Dikirim', $unshippedOrders)
              ->description('Order yang belum dikirim')
              ->color('danger')
              ->icon('heroicon-o-inbox'),
        ];
    }
}