<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sportif extends Model
{
    use HasFactory;

    protected $table = 'sportif';

    public function epreuves()
    {
        return $this->belongsToMany(Epreuve::class, 'participations', 'id_sportif', 'id_epreuve');
    }
}
