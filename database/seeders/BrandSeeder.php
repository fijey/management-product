<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new \App\Models\Brand ;
        $brand->brand_name = "Xiaomi";
        $brand->save();

        $brand = new \App\Models\Brand ;
        $brand->brand_name = "Samsung";
        $brand->save();

        $brand = new \App\Models\Brand ;
        $brand->brand_name = "Oppo";
        $brand->save();

        $brand = new \App\Models\Brand ;
        $brand->brand_name = "Realme";
        $brand->save();




    }
}
