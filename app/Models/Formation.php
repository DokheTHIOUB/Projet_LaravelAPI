<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use App\Http\Controllers\Api\Exception; 



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
