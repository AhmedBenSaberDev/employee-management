<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function departement_name()
    {
        return $this->belongsTo(Departement::class,"departement_id","id");
    }
}
