<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    use HasFactory;

    protected $table = 'epreuve';

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'id_sport');
    }

    public function sportifs()
    {
        return $this->belongsToMany(Sportif::class, 'participations', 'id_epreuve', 'id_sportif');
    }
}
