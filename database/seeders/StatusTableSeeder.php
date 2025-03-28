<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            [ 'name' => 'En attente', 'created_at' => now(), 'updated_at' => now()],
            [ 'name' => 'En cours', 'created_at' => now(), 'updated_at' => now()],
            [ 'name' => 'Résolu', 'created_at' => now(), 'updated_at' => now()],
            [ 'name' => 'Bloqué', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
