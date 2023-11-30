<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    protected $fillable = [
        'libelle',
        'description',
        'dateEvenement',
        'dateLimitIns',
        'image'
    ];

    public function association()
    {
        return $this->belongsTo(Association::class);
    }
}
