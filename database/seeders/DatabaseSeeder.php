<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

    use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // RolesTableSeeder::class,
            UsersTableSeeder::class,
            StatusTableSeeder::class,
            ComplaintsTableSeeder::class,
            WebsitesTableSeeder::class,
        ]);    
// //Créer un rôle et une permission
// $admin = Role::create(['uuid' => Str::uuid()->toString(), 'name' => 'admin', 'guard_name' => 'web']);
// $agent = Role::create(['uuid' => Str::uuid()->toString(), 'name' => 'agent', 'guard_name' => 'web']);

// $manageUsers = Permission::create(['uuid' => Str::uuid()->toString(), 'name' => 'manage users', 'guard_name' => 'web']);
// $viewTasks = Permission::create(['uuid' => Str::uuid()->toString(), 'name' => 'view tasks', 'guard_name' => 'web']);

// // Associer les permissions aux rôles
// $admin->givePermissionTo($manageUsers);
// $agent->givePermissionTo($viewTasks);



    }





}
