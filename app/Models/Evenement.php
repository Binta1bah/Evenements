<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Evenement extends Model
{
    use HasFactory, Notifiable;

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
