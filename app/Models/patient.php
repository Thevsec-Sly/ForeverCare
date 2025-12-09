<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;

    protected $primaryKey = 'id';

        protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'contact',
        'address',
        'gender',
        'prescription'
    ];

}
