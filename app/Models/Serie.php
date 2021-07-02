<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class Serie extends Model
{
    use HasFactory;

    public $timestramps = false;

    protected $fillable = [
        'name',
    ];

    public function seasons() 
    {
        return $this->hasMany(Season::class);
    }
}
