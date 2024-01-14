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
    public function getEpreuves()
    {
        return $this->epreuves;
    }

    public function setEpreuves($epreuves)
    {
        $this->epreuves()->sync($epreuves);
    }
    public function nombreDiscipline()
    {
        return $this->epreuves()->distinct('discipline')->count();
    }

    public function disciplines()
    {
        return $this->epreuves()->distinct('discipline')->pluck('discipline');
    }

    public function nombreEpreuves()
    {
        return $this->epreuves()->count();
    }
}
