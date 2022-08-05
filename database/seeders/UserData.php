<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'level' => 1,
                'password' => bcrypt('1234')
            ],
            [
                'name' => 'sales',
                'email' => 'sales@gmail.com',
                'level' => 2,
                'password' => bcrypt('1234')
            ]
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
