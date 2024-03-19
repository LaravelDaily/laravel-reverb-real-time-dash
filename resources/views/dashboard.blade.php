@php use Illuminate\Support\Number; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr));"
                         class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg]  gap-6">
                        <div style="--col-span-default: 1 / -1;"
                             class="col-[--col-span-default]  ">
                            <div class=" grid gap-6 md:grid-cols-3">
                                <div class=" relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                Total Revenue:
                                            </span>
                                        </div>
                                        <div class="text-3xl font-semibold tracking-tight text-gray-950 dark:text-white">
                                            $ <span>{{ Number::format($totalRevenue) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                Revenue This Month:
                                            </span>
                                        </div>
                                        <div class="text-3xl font-semibold tracking-tight text-gray-950 dark:text-white">
                                            $ {{ Number::format($thisMonthRevenue) }}
                                        </div>
                                    </div>
                                </div>
                                <div class=" relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                Revenue Today:
                                            </span>
                                        </div>
                                        <div class="text-3xl font-semibold tracking-tight text-gray-950 dark:text-white">
                                            $ {{ Number::format($todayRevenue) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="--col-span-default: 1 / -1;"
                             class="col-[--col-span-default]  ">
                            <div class=" divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
                                <div class=" divide-y divide-gray-200 dark:divide-white/10">
                                    <div class=" flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                                        <div class="grid gap-y-1">
                                            <h3 class=" text-base font-semibold leading-6 text-gray-950 dark:text-white">
                                                Latest Orders
                                            </h3>
                                        </div>
                                    </div>
                                    <div class=" flex items-center justify-between gap-3 px-4 py-3 sm:px-6"
                                         style="display: none;">
                                        <div class="flex shrink-0 items-center gap-x-3">
                                        </div>
                                    </div>
                                </div>
                                <div class=" relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">
                                    <table class=" w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                                        <thead class="bg-gray-50 dark:bg-white/5">
                                        <tr>
                                            <th class=" px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 ">
                                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap ">
                                                        <span class="text-sm font-semibold text-gray-950 dark:text-white">
                                                            Paid at
                                                        </span>
                                                    </span>
                                            </th>
                                            <th class=" px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 .email">
                                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap ">
                                                        <span class="text-sm font-semibold text-gray-950 dark:text-white">
                                                            User
                                                        </span>
                                                    </span>
                                            </th>
                                            <th class=" px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 ">
                                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap ">
                                                        <span class="text-sm font-semibold text-gray-950 dark:text-white">
                                                            Amount
                                                        </span>
                                                    </span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                                        @foreach($latestOrders as $order)
                                            <tr class=" [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75">
                                                <td class=" p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 ">
                                                    <div class="flex w-full disabled:pointer-events-none justify-start text-start">
                                                        <div class=" grid gap-y-1 px-3 py-4">
                                                            <div class="flex max-w-max">
                                                                <div class=" inline-flex items-center gap-1.5 text-sm text-gray-950 dark:text-white  "
                                                                     style="">
                                                                    {{ $order->created_at->format('M d, Y h:i A') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class=" p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 .email">
                                                    <div class="flex w-full disabled:pointer-events-none justify-start text-start">
                                                        <div class=" grid gap-y-1 px-3 py-4">
                                                            <div class="flex max-w-max">
                                                                <div class=" inline-flex items-center gap-1.5 text-sm text-gray-950 dark:text-white  "
                                                                     style="">
                                                                    {{ $order->user->email }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class=" p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 ">
                                                    <div class="flex w-full disabled:pointer-events-none justify-start text-start">
                                                        <div class=" grid gap-y-1 px-3 py-4">
                                                            <div class="flex max-w-max">
                                                                <div class=" inline-flex items-center gap-1.5 text-sm text-gray-950 dark:text-white  "
                                                                     style="">
                                                                    $ {{ Number::format($order->total) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div style="--col-span-default: span 1 / span 1;"
                             class="col-[--col-span-default]  ">
                            <section
                                    class=" rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10"
                                    data-has-alpine-state="true">
                                <header class=" flex items-center gap-x-3 overflow-hidden px-6 py-4">
                                    <div class="grid flex-1 gap-y-1">
                                        <h3
                                                class=" text-base font-semibold leading-6 text-gray-950 dark:text-white">
                                            Revenue by day
                                        </h3>
                                    </div>
                                </header>
                                <div class=" border-t border-gray-200 dark:border-white/10">
                                    <div class=" p-6">
                                        <canvas id="revenueByDay"></canvas>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div style="--col-span-default: span 1 / span 1;"
                             class="col-[--col-span-default]  ">
                            <section
                                    class=" rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10"
                                    data-has-alpine-state="true">

                                <header class=" flex items-center gap-x-3 overflow-hidden px-6 py-4">
                                    <div class="grid flex-1 gap-y-1">
                                        <h3
                                                class=" text-base font-semibold leading-6 text-gray-950 dark:text-white">
                                            Revenue by month
                                        </h3>
                                    </div>
                                </header>
                                <div class=" border-t border-gray-200 dark:border-white/10">
                                    <div class=" p-6">
                                        <canvas id="revenueByMonth"></canvas>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const revenueByDay = document.getElementById('revenueByDay');
        const revenueByMonth = document.getElementById('revenueByMonth');

        new Chart(revenueByDay, {
            type: 'bar',
            data: {
                labels: @json($orderChartByDay['labels']),
                datasets: [{
                    label: '# of Votes',
                    data: @json($orderChartByDay['totals']),
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(revenueByMonth, {
            type: 'bar',
            data: {
                labels: @json($orderChartByMonth['labels']),
                datasets: [{
                    label: '# of Votes',
                    data: @json($orderChartByMonth['totals']),
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
