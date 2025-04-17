<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Mechanic extends Model
{
    //
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
