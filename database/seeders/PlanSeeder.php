<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'title' => 'Standard',
            'slug' => 'standard',
            'stripe_id' => 'price_1Ox4u0FYg7QRDhwUdEoY0wJT'
        ]);
        Plan::create([
            'title' => 'Premium',
            'slug' => 'premium',
            'stripe_id' => 'price_1Ox4uUFYg7QRDhwUEeHErQG9'
        ]);
    }
}
