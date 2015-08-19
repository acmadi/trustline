<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@root.com',
            'password' => Hash::make('admin'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);
    }

}