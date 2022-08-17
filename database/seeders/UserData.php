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
                'nama_lengkap' => 'Admin Sumber Rejeki',
                'posisi' => 'Admin',
                'username' => 'adminsr',
                
                'level' => 1,
                'password' => bcrypt('1234')
            ],
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
