<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    use HasFactory;
    
    protected $table ="reservas";
    protected $fillable = [

        "codigo",
        "descripcion",
       
    ];

    protected $hidden =[
        "vehiculo_id",
        "cliente_id",
        "id",
        "created_at",
        "updated_at"
    ];

    public function cliente(){
        return $this->belongsTo(clientes::class);
    }

    public function vehiculo(){
        return $this->belongsTo(Vehiculos::class);
    }

}
