<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admission;
use App\Models\patient;
use App\Models\drug;
use App\Models\patient_insurance;

class dashboardController extends Controller
{
    public function dashboard()
{
    // Count all patients in the DB
    $totalPatients = patient::count();

    // Get 5 most recent patients
    $recentPatients = Patient::latest()->take(3)->get();

    // Get 5 most recently added drugs
    $recentDrugs = Drug::latest()->take(3)->get();

    //Counts all drugs in the DB
    $totaldrugs = drug::count();

    // Count today's admissions
    $admissionsToday = admission::whereDate('created_at', today())->count();

    // Count pending insurance claims
    //$pendingClaims = patient_insurance::where('status', 'pending')->count();

    return view('dashboard', compact('totalPatients', 'totaldrugs','admissionsToday', 'recentPatients', 'recentDrugs'));
}
}
