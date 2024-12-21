<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Events\OrderCreatedEvent;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('orders.create');
    }

    public function create(): View
    {
        $users = User::pluck('email', 'id');

        return view('orders.create', compact('users'));
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $order = Order::create($request->validated());

        event(new OrderCreatedEvent($order));

        return redirect()->route('orders.create');
//        return redirect()->route('dashboard');
    }
}
