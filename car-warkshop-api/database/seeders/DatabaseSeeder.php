<?php

namespace Database\Seeders;


use App\Models\Admin;
use App\Models\Mechanic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Database\Seeders\AppointmentSeeder;
use Database\Seeders\MechanicSeeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //Calling Custo Seeder
        $this->call(MechanicSeeder::class);
        $this->call(AdminSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example123.com',
        ]);
    }
}
