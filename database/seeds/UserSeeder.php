<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         if(DB::table('users')->get()->count() == 0){
            DB::table('users')->insert([
                [
                    'name' => 'Zidan Indratama',
                    'email' => 'zidanindratama@gmail.com',
                    'role' => 'Administrator',
                    'username' => 'zidanindratama',
                    'password' => Hash::make('zidanindratama@gmail.com'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Owner',
                    'email' => 'owner@gmail.com',
                    'role' => 'Owner',
                    'username' => 'owner',
                    'password' => Hash::make('owner@gmail.com'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'kasir',
                    'email' => 'kasir@gmail.com',
                    'role' => 'Kasir',
                    'username' => 'kasir',
                    'password' => Hash::make('kasir@gmail.com'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'waiter',
                    'email' => 'waiter@gmail.com',
                    'role' => 'Waiter',
                    'username' => 'waiter',
                    'password' => Hash::make('waiter@gmail.com'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'pelanggan',
                    'email' => 'pelanggan@gmail.com',
                    'role' => 'Pelanggan',
                    'username' => 'pelanggan',
                    'password' => Hash::make('pelanggan@gmail.com'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
