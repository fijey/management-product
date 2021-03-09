<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SalesOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salesOrder = new \App\Models\SalesOrder;
        $salesOrder->customer_id = 1;
        $salesOrder->product_id = 1;
        $salesOrder->save();
    }
}
