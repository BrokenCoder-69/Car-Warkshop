<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Mechanic;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    //Get all the appointments
    public function index()
    {
        $appointments = Appointment::with('client', 'mechanic')->get();

        return response()->json([
            'appointments' => $appointments
        ]);
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }


    public function create_appointment(Request $request)
    {
        $client = new Appointment();
        $client->name = $request->name;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->license_number = $request->license_number;
        $client->engine_number = $request->engine_number;
        $client->mechanic_id = $request->mechanic_id;
        $client->appointment_date = $request->appointment_date;

        $date = Carbon::today()->toDateString(); // or use any specific date

        $appointmentCount = Appointment::where('mechanic_id', $request->mechanic_id)
            ->whereDate('appointment_date', $date)
            ->count();

        
        // Checking if the aclient has another appointment that day
        $clients = Appointment::where('license_number', $request->license_number)->where('appointment_date', $request->appointment_date)->first();
        if ($clients) {
            return response()->json([
                'message' => 'Appointment already exists for this client on the selected date. Registration cancelled.'
            ], 409); // 409 Conflict
        }
        else if($appointmentCount>4){
            return response()->json([
                'message' => 'Mechanic has more appoinment.'
            ], 409); // 409 Conflict
        }
        else{
            $client->save();
        }

        return response()->json([
            'message' => 'Client created successfully',
            'Client' => $client
        ], 201);
    }
}
