<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourDate extends Model
{
    //
    protected $fillable = [
        'tour_id',
        'mes',
        'label',
        'value',
        'precio'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
