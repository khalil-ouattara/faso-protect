<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => Str::uuid()->toString(),
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                // 'role_id' => DB::table('roles')->where('name', 'Admin')->first()->id,
                'remember_token' => Str::random(10),
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Agent',
                'email' => 'agent@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                // 'role_id' => DB::table('roles')->where('name', 'Agent')->first()->id,
                'remember_token' => Str::random(10),
            ],
        ]);

    }
}
