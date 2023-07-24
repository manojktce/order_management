<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = [
            [
               'first_name'=>'Admin',
               'last_name' => 'admin',
               'email'=>'admin@gmail.com',
               'password'=> bcrypt('12345678'),
               'user_type'=>'Admin',
            ],
            [
                'first_name'=>'Vendor',
                'last_name' => 'v',
                'email'=>'vendor@gmail.com',
                'password'=> bcrypt('12345678'),
                'user_type'=>'Vendor',
            ],
            [
                'first_name'=>'User',
                'last_name' => 'u',
                'email'=>'user@gmail.com',
                'password'=> bcrypt('12345678'),
                'user_type'=>'User',
            ],

        ];
  
        foreach ($user as $key => $value) {
            $u_type = $value['user_type'];
            unset($value['user_type']);
            $new_user = User::create($value);
            $new_user->assignRole($u_type);
        }
    }
}
