<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\patient;
use App\Models\admission;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ward;

class PatientController extends Controller
{


public function index(Request $request)
{
    $totalPatients = patient::count();
        // Get 5 most recent patients
    $query = Patient::query();
    // If search term exists, filter results
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('contact', 'like', "%{$search}%")
              ->orWhere('address', 'like', "%{$search}%");
    });
    }
    // Paginate results (30 per page)
    $patients = $query->latest()->paginate(30);
    return view('patients.index', compact('patients', 'totalPatients'));
}



public function show($id)
{
    // Find patient by ID or fail with 404
    $patient = Patient::findOrFail($id);
    // Pass patient to the view
    return view('patients.show', compact('patient'));
}





public function update(Request $request, $id)
{
    $patient = Patient::findOrFail($id);
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'dob'        => 'required|date',
        'contact'    => 'required|string|max:20',
        'address'    => 'required|string|max:255',
    ]);
    $patient->update($validated);
    return redirect()->route('patients.show', $patient->id)->with('success', 'Profile updated successfully.');
}



public function create()
{
    $wards = Ward::all(); // ✅ fetch all wards

    return view('patients.create', compact('wards'));
}



public function store(Request $request)
{
$validated = $request->validate([
    'first_name' => 'required|string|max:255',
    'last_name' => 'required|string|max:255',
    'dob' => 'required|date',
    'gender' => 'required|string',
    'contact' => 'required|string|max:20',
    'address' => 'required|string|max:255',
    'prescription' => 'nullable|string',
    'is_admitted' => 'nullable|boolean',
]);

$validated['is_admitted'] = $request->has('is_admitted');

// Create patient
$patient = Patient::create($validated);

// Create admission if admitted
if ($validated['is_admitted']) {
    Patient::where('id', $patient->id)->update(['is_admitted' => 1]);
    $doctor = Auth::user();
    $doctor = Auth::user(); // logged-in doctor
    // $nurse  = User::where('role', 'Nurse')->find($request->nurse_id);
    $ward = Ward::find($request->ward_id);


    if ($doctor && $doctor->role === 'Doctor') {
        Admission::create([
            'patient_id'   => $patient->id,
            'patient_name' => $patient->first_name . ' ' . $patient->last_name,
            'doctor_id'    => $doctor->id,
            'doctor_name'  => $doctor->name,
            'ward_id'      => $ward->id,
            'ward_name'    => $ward->ward_name,
            'bed_number'   => $request->bed_number,
            // 'nurse_id'     => $nurse->id,
            // 'nurse_name'   => $nurse->nurse_name,
            'admission_date' => now(),
        ]);

    } else {
        // fallback if no doctor is logged in
        Admission::create([
            'patient_id'   => $patient->id,
            'patient_name' => $patient->first_name . ' ' . $patient->last_name,
            'admission_date' => now(),
            'doctor_name'  => 'Unknown', // ✅ prevents null error
        ]);
    }
}
    return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
}


public function destroy($id)
{
    $patient = Patient::findOrFail($id);
    $patient->delete();

    return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
}

}
