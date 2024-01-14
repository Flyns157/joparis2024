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
}
