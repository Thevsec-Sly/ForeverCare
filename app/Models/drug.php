<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drug extends Model
{
    /** @use HasFactory<\Database\Factories\DrugFactory> */
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'size',
        'type',
        'description', 
        'stock',
        'expiry_date',
    ];
}
