<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Azka ainurridho',
            'username' => 'azkaainurridho',
            'email' => 'azkaainurridho@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(48)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Game Developer',
            'slug' => 'game-developer'
        ]);

        Category::create([
            'name' => 'Android Developer',
            'slug' => 'android-developer'
        ]);

        Category::create([
            'name' => 'Mac Developer',
            'slug' => 'mac-developer'
        ]);

        Post::factory(500)->create();
    }
}
