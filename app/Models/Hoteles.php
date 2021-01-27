<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoteles extends Model
{
    use HasFactory;

    protected $table = "hotel";

    protected $fillable =  ['idHotel','nombre_hotel','clasificacion','categoria','num_habitaciones','plazas'];

}
