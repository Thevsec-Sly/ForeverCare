<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admission extends Model
{
    /** @use HasFactory<\Database\Factories\AdmissionFactory> */
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
            'patient_id',
            'patient_name',
            'doctor_id',
            'doctor_name',
            'ward_id',
            'ward_name',
            'bed_number',
            // 'nurse_id',
            // 'nurse_name',
            'admission_date'
    ];

    public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id');
}

public function patient()
{
    return $this->belongsTo(Patient::class);
}

public function nurse()
{
    return $this->belongsTo(User::class, 'nurse_id');
}

public function ward()
{
    return $this->belongsTo(Ward::class);
}
}
