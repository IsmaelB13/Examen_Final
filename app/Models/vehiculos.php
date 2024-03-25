<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculos extends Model
{
    use HasFactory;

    
    protected $table ="vehiculos";
    protected $fillable = [

        "marca",
        "placa",
        "color",
        "tipo_vehiculo",
    ];

    protected $hidden =[
        "created_at",
        "updated_at"
    ];

     //relacion de uno a muchos
     public function reservas(){
        return $this->hasMany(Reservas::class);
    }
}
