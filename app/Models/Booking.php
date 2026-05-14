<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //

    protected $fillable = [
        'tour_id',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'adultos',
        'ninos',
        'status',
        'precio_total',
        'tipo_cama',
        'cama_extra',
        'nombre2',
        'apellido2'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
