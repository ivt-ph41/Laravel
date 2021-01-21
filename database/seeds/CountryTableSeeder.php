<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'USA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'VN',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'JP',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        \App\Country::insert($data);
    }
}
