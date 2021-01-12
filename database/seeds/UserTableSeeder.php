<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //c1
        // $data = [
        //     'name' => 'user1',
        //     'email' => 'abc@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'phone' => '1234453243',
        //     'gender' => 1
        // ];

        // User::create($data);

        //C2
        factory(User::class, 100)->create();
    }
}
