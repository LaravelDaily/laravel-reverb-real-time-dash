<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrdersService
{
    public function getTotalRevenue(): float|int
    {
        return Order::query()
                ->pluck('total')
                ->sum() / 100;
    }

    public function getThisMonthRevenue(): float|int
    {
        return Order::query()
                ->whereMonth('created_at', now()->month)
                ->pluck('total')
                ->sum() / 100;
    }

    public function getTodayRevenue(): float|int
    {
        return Order::query()
                ->whereDate('created_at', now()->toDateString())
                ->pluck('total')
                ->sum() / 100;
    }

    public function getLatestOrders(int $count): Collection
    {
        return Order::query()
            ->with('user:id,email')
            ->latest()
            ->take($count)
            ->get();
    }

    public function orderChartByDay($days = 15): array
    {
        $orders = Order::query()
            ->selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->get();

        $labels = $orders->pluck('date');
        $totals = $orders->pluck('total');

        return [
            'labels' => $labels,
            'totals' => $totals,
        ];
    }

    public function orderChartByMonth($months = 12): array
    {
        $orders = Order::query()
            // SQLite date functions
            ->selectRaw('strftime("%Y", created_at) as year, strftime("%m", created_at) as month, SUM(total) as total')
            // MySQL date functions
//            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as total')
            ->where('created_at', '>=', now()->subMonths($months))
            ->groupBy('year', 'month')
            ->get();

        $labels = $orders->map(function ($order) {
            return $order->year . '-' . $order->month;
        });
        $totals = $orders->pluck('total');

        return [
            'labels' => $labels,
            'totals' => $totals,
        ];
    }
}