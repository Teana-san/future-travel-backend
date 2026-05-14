<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourDay extends Model
{
    //

    protected $fillable = [
        'tour_id',
        'dia_label',
        'titulo',
        'imagen',
        'descripcion'
    ];

    protected $casts = [
        'descripcion' => 'array', // Чтобы описание (массив строк) хранилось как JSON
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
