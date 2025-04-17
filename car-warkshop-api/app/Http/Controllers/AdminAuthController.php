<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;



class AdminAuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $admin->createToken('admin-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token
        ]);


    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    
        return response()->json([
            'message' => 'Logout successful'
        ]);
    }

    public function getClient()
    {
        // Fetch all clients ordered by creation time (latest first)
        $clients = Client::orderBy('created_at', 'desc')->get();
    
        return response()->json([
            'message' => 'Clients fetched successfully',
            'data' => $clients
        ]);
    }


    public function update(Request $request, $id)
    {
        // Find client by ID
        $client = Client::find($id);
    
        if (!$client) {

            return response()->json(['message' => 'Client not found'], 404);
        }
        
        $client->prefered_mechanic=$request->prefered_mechanic;
        $client->appointment_date=$request->appointment_date;
        // Update fields
        $client->save();
    
        return response()->json([
            'message' => 'Client updated successfully',
            'data' => $client
        ]);
    }
    
    


}
