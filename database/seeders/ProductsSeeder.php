<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Models\Product;
        $product->product_name = "Xiaomi Redmi 5A";
        $product->product_brand = "Xiaomi";
        $product->product_price = 1000000;
        $product->product_picture = '/img/product/xiaomi/xiaomiredmi5a';
        $product->product_description = 'Xiaomi Redmi 5a adalah handphone keluaran Xiaomi di range
        1 jutaan dengan spek yang lumayan memuaskan';
        $product->save();


    }
}
