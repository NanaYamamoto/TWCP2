<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(App\Users::class, (array)5)->create();
        \App\Models\User::factory(App\User::class)->count(5)->create();
    }
}
