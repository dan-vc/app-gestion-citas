<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medications extends Model
{
    /** @use HasFactory<\Database\Factories\MedicationsFactory> */
    use HasFactory;
    protected $table = 'medications';
    protected $fillable = [
        'name',
        'dose',
        'frequency',
        'duration',
        'treatment_id',
        'supplier',
        'side_affects'
    ];

    public function treatment() {
        return $this->belongsTo(Treatments::class);
    }
}
