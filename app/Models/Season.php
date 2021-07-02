<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Episode;
use App\Models\Serie;

class Season extends Model
{
    use HasFactory;

    public function episodes ()
    {
        return $this->hasMany(Episode::class );
    }

    public function serie ()
    {
        return $this->belongsTo(Serie::class);
    }
}
