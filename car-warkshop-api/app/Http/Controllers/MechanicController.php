<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    //
    public function index(Request $request)
    {
        $mechanic = Mechanic::get();
        return response()->json(
            $mechanic
        );
    }
}
