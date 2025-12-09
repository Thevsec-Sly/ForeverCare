<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPStan\Rules\Functions\PrintfParametersRule;

class drug_administration extends Model
{
    /** @use HasFactory<\Database\Factories\DrugAdministrationFactory> */
    use HasFactory;

    protected $primaryKey = 'id';
}
