<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $filleable=['id', 'id_exp','id_des', 'tel', 'objet', 'contenu'];
}
