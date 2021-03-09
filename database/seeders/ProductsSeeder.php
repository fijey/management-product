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

        $product = new \App\Models\Product;
        $product->product_name = "Samsung Galaxy A10s";
        $product->product_brand = "Samsung";
        $product->product_price = 1329500;
        $product->product_picture = '/img/product/xiaomi/xiaomiredmi5a';
        $product->product_description = 'Samsung Galaxy A10s adalah handphone keluaran samsung di range
        1 jutaan dengan spek yang lumayan memuaskan';
        $product->save();
       
        $product = new \App\Models\Product;
        $product->product_name = "Oppo A15";
        $product->product_brand = "Oppo";
        $product->product_price = 1799500;
        $product->product_picture = '/img/product/xiaomi/xiaomiredmi5a';
        $product->product_description = 'Oppo A15 adalah handphone keluaran Oppo di range
        1 jutaan dengan spek yang lumayan memuaskan';
        $product->save();

        $product = new \App\Models\Product;
        $product->product_name = "Realme C2";
        $product->product_brand = "Realme";
        $product->product_price = 1799500;
        $product->product_picture = '/img/product/xiaomi/xiaomiredmi5a';
        $product->product_description = 'Realme C2 adalah handphone keluaran Realme di range
        1 jutaan dengan spek yang lumayan memuaskan';
        $product->save();


    }
}
