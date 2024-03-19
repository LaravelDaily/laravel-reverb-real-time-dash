<?php

namespace App\Http\Controllers;

use App\Services\OrdersService;

class DashboardController extends Controller
{
    public function __invoke(OrdersService $ordersService)
    {
        $totalRevenue = $ordersService->getTotalRevenue();
        $thisMonthRevenue = $ordersService->getThisMonthRevenue();
        $todayRevenue = $ordersService->getTodayRevenue();
        $latestOrders = $ordersService->getLatestOrders(5);
        $orderChartByMonth = $ordersService->orderChartByMonth();
        $orderChartByDay = $ordersService->orderChartByDay();

        return view(
            'dashboard',
            compact(
                'totalRevenue',
                'thisMonthRevenue',
                'todayRevenue',
                'latestOrders',
                'orderChartByDay',
                'orderChartByMonth'
            )
        );
    }
}
