<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentsFactory> */
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'date',
        'reason',
        'patient_id',
        'doctor_id',
        'status',
        'observations',
        'room'
    ];

    public function patient() {
        return $this->belongsTo(Patients::class);
    }
    public function doctor() {
        return $this->belongsTo(Doctors::class);
    }
}
