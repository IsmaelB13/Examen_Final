<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;

    protected $table ="clientes";
    protected $fillable = [

        "nombre",
        "apellido",
        "cieudad",
        "email",
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
