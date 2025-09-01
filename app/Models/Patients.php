<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    /** @use HasFactory<\Database\Factories\PatientsFactory> */
    use HasFactory;
    protected $table = 'patients';

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'address',
        'blood_type'
    ];

    public function appointments() {
        return $this->hasMany(Appointments::class);
    }

    public function diagnoses() {
        return $this->hasMany(Diagnoses::class);
    }

}
