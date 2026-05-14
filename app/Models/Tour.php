<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IncludedService;

class Tour extends Model
{
    //
    protected $fillable = [
        'titulo',
        'pais',
        'inicio_fin',
        'ciudades_texto',
        'ciudades_list',
        'texto',
        'excursion_titulo',
        'duracion',
        'cantidad',
        'status',
        'imagen_principal',
        'imagen_section1',
        'imagen_incluido',
        'imagen_no_incluido'
    ];

    // Указываем, что это поле должно автоматически превращаться из JSON в массив и обратно
    protected $casts = [
        'ciudades_list' => 'array',
    ];


    public function tourDays()
    {
        return $this->hasMany(TourDay::class);
    }

    public function tourDates()
    {
        return $this->hasMany(TourDate::class);
    }

    public function includedServices()
    {
        return $this->belongsToMany(IncludedService::class, 'service_tour');
    }
}
