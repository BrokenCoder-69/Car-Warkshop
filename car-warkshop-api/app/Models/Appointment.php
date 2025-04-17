<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Mechanic;
class Appointment extends Model
{
    public function client()
    {
        return $this->belongsTo(client::class);
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }
}
