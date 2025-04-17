<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        //
    {
            // Sample IDs – replace these with real existing IDs from your database
        $clientId = 1;
        $mechanicId = 1;
    
        Appointment::create([
            
            'client_id' => $clientId,
            'mechanic_id' => $mechanicId,
            'appointment_date' => Carbon::now()->addDays(2)->format('Y-m-d'), // e.g. two days from now
        ]);
        $clientId = 2;
        Appointment::create([
            'client_id' => $clientId,
            'mechanic_id' => $mechanicId,
            'appointment_date' => Carbon::now()->addDays(2)->format('Y-m-d'), // e.g. two days from now
        ]);

        $clientId = 3;
        Appointment::create([
            'client_id' => $clientId,
            'mechanic_id' => $mechanicId,
            'appointment_date' => Carbon::now()->addDays(2)->format('Y-m-d'), // e.g. two days from now
        ]);

        $clientId = 4;
        Appointment::create([
            'client_id' => $clientId,
            'mechanic_id' => $mechanicId,
            'appointment_date' => Carbon::now()->addDays(2)->format('Y-m-d'), // e.g. two days from now
        ]);
        
        $clientId = 5;
        Appointment::create([
            'client_id' => $clientId,
            'mechanic_id' => $mechanicId,
            'appointment_date' => Carbon::now()->addDays(2)->format('Y-m-d'), // e.g. two days from now
        ]);



    }

}
