<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $table = 'sport';

    public function epreuves()
    {
        return $this->hasMany(Epreuve::class, 'id_sport');
    }
    public function getEpreuves()
    {
        return $this->epreuves;
    }

    public function setEpreuves($epreuves)
    {
        $this->epreuves()->sync($epreuves);
    }

    public function getDebut()
    {
        return $this->epreuves()->orderBy('date', 'asc')->first()->date;
    }

    public function getFin()
    {
        return $this->epreuves()->orderBy('date', 'desc')->first()->date;
    }
    public function nombreDiscipline()
    {
        return $this->epreuves()->distinct('discipline')->count();
    }

    public function disciplines()
    {
        return $this->epreuves()->distinct('discipline')->pluck('discipline');
    }
}
