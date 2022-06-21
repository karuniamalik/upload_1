<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
        User::create([
            'name' => 'malik',
            'email' => 'malik@gmail.com',
            'no_hp' => '081917708181',
            'password' => bcrypt(123456),
        ]);
    }
}
