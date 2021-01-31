<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Factory::create();
        foreach (range(1,20) as $index){
            $name = $facker->name;
            Post::create([
                'user_id' => rand(1,21),
                'category_id' => rand(1,20),
                'title' => $name,
                'slug' => strtolower(str_replace(' ','-',$name)),
                'desc' => $facker->paragraph,
                'image' => $facker->imageUrl(),
                'status' => 'active',
            ]);
        }
    }
}
