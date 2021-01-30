<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Factory::create();
        foreach (range(1,10) as $index){
            $name = $facker->name;
            Category::create([
                'user_id' => rand(1,21),
                'name' => $name,
                'slug' => strtolower(str_replace(' ','-',$name)),
                'status' => 'active'
            ]);
        }
    }
}
