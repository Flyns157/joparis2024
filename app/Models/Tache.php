<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'expiration',
        'categorie',
        'effectuee',
        'description'
    ];

    protected $casts = [
        'expiration' => 'datetime',
    ];
}
