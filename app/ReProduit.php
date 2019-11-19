<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReProduit extends Model
{
    protected $fillable = [
        'nom',
        'dosage',
        'forme',
        'presentation',
        'labo_demandeur',
        'labo_fabricant',
        'type_demande',
        'user_id',
        'recevabilite_id'
    ];
}
