<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorsFactory> */
    use HasFactory;
    protected $table = 'doctors';

    protected $fillable = [
        'first_name',
        'last_name',
        'specialty',
        'phone',
        'email',
        'license',
        'years_experience'
    ];

    public function appointments() {
        return $this->hasMany(Appointments::class);
    }

    public function diagnoses() {
        return $this->hasMany(Diagnoses::class);
    }

    public function treatments() {
        return $this->hasMany(Treatments::class);
    }
}
