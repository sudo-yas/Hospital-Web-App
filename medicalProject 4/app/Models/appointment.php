<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $filleable=['id', 'id_medecin','id_patient', 'debut', 'fin', 'etat', 'StructH'];

}
