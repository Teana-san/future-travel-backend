<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncludedService extends Model
{
    //
    // Поля, которые можно заполнять через ::create()
    protected $fillable = ['icon', 'title', 'description'];

    protected $casts = [
        'description' => 'array',
    ];

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'service_tour');
    }
}
