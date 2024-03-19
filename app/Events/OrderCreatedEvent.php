<?php

namespace App\Events;

use App\Models\Order;
use App\Services\OrdersService;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Number;

class OrderCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $totalRevenue;
    public string $thisMonthRevenue;
    public string $todayRevenue;
    public array $latestOrders;
    public array $orderChartByMonth;
    public array $orderChartByDay;

    public function __construct(public Order $order)
    {
        $ordersService = new OrdersService();

        $this->totalRevenue = Number::format($ordersService->getTotalRevenue());
        $this->thisMonthRevenue = Number::format($ordersService->getThisMonthRevenue());
        $this->todayRevenue = Number::format($ordersService->getTodayRevenue());
        $this->latestOrders = $ordersService->getLatestOrders(1)->map(function(Order $order) {
            return [
                'id' => $order->id,
                'user' => $order->user->toArray(),
                'total' => Number::format($order->total),
                'created_at' => $order->created_at->format('M d, Y h:i A')
            ];
        })->toArray();
        $this->orderChartByMonth = $ordersService->orderChartByMonth(0);
        $this->orderChartByDay = $ordersService->orderChartByDay(0);
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('order-dashboard-updates')
        ];
    }
}
