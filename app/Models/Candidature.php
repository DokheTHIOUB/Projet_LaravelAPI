<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{

    protected $fillable=[
        'user_id',
        'user_formation',
        'statut',
    ] ;

    public function Utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function Formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
