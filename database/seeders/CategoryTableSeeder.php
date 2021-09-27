<?php

namespace Database\Seeders;

use app\Http\Controllers\Admin\Category\CategoryController;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        //factory(CategoryController::class, 50)->create(); //50個のダミーデータを生成
        //$this->call(categorieTableSeeder::class);
        //factory(App\Category::class, 50)->create();
        \App\Models\Category::factory()->count(50)->create();
    }
}
