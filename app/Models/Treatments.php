<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    /** @use HasFactory<\Database\Factories\TreatmentsFactory> */
    use HasFactory;
    protected $table = 'treatments';
    protected $fillable = [
        'name',
        'description',
        'duration',
        'diagnosis_id',
        'doctor_id',
        'status',
        'administration_frequency'
    ];
    public function medication() {
        return $this->hasMany(Medications::class);
    }
    public function diagnosis() {
        return $this->belongsTo(Diagnoses::class);
    }
    public function doctor() {
        return $this->belongsTo(Doctors::class);
    }
}
