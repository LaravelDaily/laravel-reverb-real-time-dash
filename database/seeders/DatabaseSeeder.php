<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@admin.com',
        ]);

        User::factory()
            ->count(10)
            ->has(Order::factory()->count(5))
            ->create();
    }
}
