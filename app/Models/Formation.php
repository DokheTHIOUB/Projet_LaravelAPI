<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 


class Formation extends Model
{

    protected $fillable = [
        'nom_formation',
        'description',
        'duree',
        'statut',
    ];

    public function Candidature()
    {
        return $this->HasMany(Candidature::class);
    }
    
}
