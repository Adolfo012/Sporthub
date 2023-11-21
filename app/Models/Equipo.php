<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    public function getRouteKeyName() //Specifies the search field by url
    {
        return 'name'; //Search by team name in url Ex: equipo->name
    }
}
