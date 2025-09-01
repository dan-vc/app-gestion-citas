<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnoses extends Model
{
    /** @use HasFactory<\Database\Factories\DiagnosesFactory> */
    use HasFactory;
    protected $table = 'diagnoses';
    protected $fillable = [
        'description',
        'date',
        'patient_id',
        'doctor_id',
        'severity',
        'recommendations',
        'diagnosis_type'
    ];

    public function treatments() {
        return $this->hasMany(Treatments::class);
    }

    public function patient() {
        return $this->belongsTo(Patients::class);
    }
    public function doctor() {
        return $this->belongsTo(Doctors::class);
    }
}
