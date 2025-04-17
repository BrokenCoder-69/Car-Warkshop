<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Mechanic;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $mechanics = [
            'Rafi',
            'Faiyaz',
            'Tashfiq',
            'Korim',
            'Jobbar'
        ];


        foreach($mechanics as $name){
            Mechanic::create([
                'name' => $name,
                'specialization' => 'General Repair',
            ]);
        }



    }
}
