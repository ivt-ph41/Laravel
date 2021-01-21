<?php

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
        $this->call(CountryTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
