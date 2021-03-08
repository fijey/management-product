<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->name = "Fajar Mukti Hidayat";
        $user->email = "fajarmukti9@gmail.com";
        $user->password = bcrypt("12345678");
        $user->save();
    }
}
