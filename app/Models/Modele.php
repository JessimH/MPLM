<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'marque_id',
    ];

    public function marques()
    {
        return $this->belongsTo(Marque::class);
    }

    public function sneakers()
    {
        return $this->hasMany(Sneaker::class);
    }
}
