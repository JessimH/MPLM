<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
        'modele_id',
        'marque_id'
    ];

    public function modeles()
    {
        return $this->belongsTo(Modele::class);
    }

    public function marques()
    {
        return $this->belongsTo(Marque::class);
    }
}
