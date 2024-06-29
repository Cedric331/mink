<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'age',
        'photos',
        'race',
        'description',
        'statut',
        'price_ht',
        'price_ttc',
        'tva'
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    protected $appends = [
        'currentSlide'
    ];

    CONST STATUT_ON_SALE = 'En vente';
    CONST STATUT_SOLD = 'Vendu';

    public function getCurrentSlideAttribute(): int
    {
        return 0;
    }
}
