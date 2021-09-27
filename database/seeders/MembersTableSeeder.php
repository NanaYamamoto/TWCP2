<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Member::factory(App\Members::class)->count(5)->create();
    }
}
