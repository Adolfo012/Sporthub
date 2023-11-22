<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;
    public function organizador()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function estadistica()
    {
        return $this->belongsToMany(Equipo::class,'estadisticas')->withPivot('PT','CA','DC','CC');
    }
    public function tienen()
    {
        return $this->belongsToMany(Partido::class,'partido_torneos');
    }
    
}
