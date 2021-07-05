<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Episode, Serie};

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
    ];

    public $timestramps = false;

    public function episodes ()
    {
        return $this->hasMany(Episode::class);
    }

    public function serie ()
    {
        return $this->belongsTo(Serie::class);
    }
}
