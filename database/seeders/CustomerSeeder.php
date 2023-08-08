<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(26)
            ->hasInvoices(5)
            ->create();

        Customer::factory()
            ->count(100)
            ->hasInvoices(15)
            ->create();

        Customer::factory()
            ->count(50)
            ->hasInvoices(10)
            ->create();

        Customer::factory()
            ->count(6)
            ->create();
    }
}
