<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class Client extends Model
{
    //
    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }

}
