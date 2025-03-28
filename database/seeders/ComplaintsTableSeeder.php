<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ComplaintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('complaints')->insert([
            [
                
                'user_id' => DB::table('users')->where('name', 'Agent')->first()->id,
                'complainant' => 'John Doe',
                'subject' => 'Delivery issue',
                'description' => 'The package was not delivered on time.',
                'status_id' => DB::table('status')->where('name', 'En cours')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'user_id' => DB::table('users')->where('name', 'Admin')->first()->id,
                'complainant' => 'Jane Smith',
                'subject' => 'Damaged item',
                'description' => 'The delivered item was damaged upon arrival.',
                'status_id' => DB::table('status')->where('name', 'En attente')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
