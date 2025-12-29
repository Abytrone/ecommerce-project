<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
                // ShieldSeeder::class, // Call Shield seeder if not already called automatically or manually
            CategorySeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
        ]);

        // Ensure an admin user exists if not already
        if (!\App\Models\User::where('email', 'admin@anchor.com')->exists()) {
            $user = \App\Models\User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@anchor.com',
                'password' => bcrypt('password'),
            ]);

            // Create and assign super_admin role
            $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'super_admin']);
            $user->assignRole($role);
        }
    }
}
