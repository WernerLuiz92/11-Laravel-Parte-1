<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        'title',
        'releaseDate',
        'endDate',
    ];

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}
