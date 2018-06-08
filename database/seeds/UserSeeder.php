<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Model\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[ 'name' => 'Steven' ,'phone' => '088888888888', 'blood_type_id' => 3, 'email' => 'stevenwillington11@gmail.com', 'password' => Hash::make('password'), 'remember_token' => null ]
        ];

        foreach ($users as $user) {
        	User::create($user);
        }
    }
}
