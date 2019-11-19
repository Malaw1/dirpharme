<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RePiece extends Model
{
    protected $fillable = [
        'lettre_demande',
        'rcp',
        'attestation_prix',
        'echantillon_produit',
        'bulletin_analyse_produit',
        'echantillon_matiere',
        'bulletin_analyse_matiere',
        'dossier_technique',
        ''
    ];
}
