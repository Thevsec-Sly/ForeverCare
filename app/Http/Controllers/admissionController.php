<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\admission;
use Illuminate\Http\Request;

class admissionController extends Controller
{
    public function index(){

        $admissions = Admission::with(['patient', 'doctor', 'nurse', 'ward'])
        ->orderBy('ward_id')
        ->orderBy('bed_number')
        ->get();

        $totalAdmissions = admission::count();
        $admissionsToday = admission::whereDate('created_at', today())->count();

        return view('admissions.index', compact('admissions', 'totalAdmissions', 'admissionsToday'));
    }
}
