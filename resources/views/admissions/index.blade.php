@extends('layouts.sideBar')

@section('content')
    <div class="dash-con">
            <!-- Search Bar -->
<div class="search-bar">
    <form action="{{ route('admissions.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search for patients..." 
               value="{{ request('search') }}" class="search-input">
        <button type="submit" class="search-button">Search</button>
    </form>
</div>

    <!-- Quick Stats Widget -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <div class="stats-widget">
            <h4 class="stats-title">Total Admissions</h4>
            <p class="stats-value text-blue-600">{{ $totalAdmissions }}</p>
        </div>
        <div class="stats-widget">
            <h4 class="stats-title">Admissions Today</h4>
            <p class="stats-value text-green-600">{{ $admissionsToday }}</p>
        </div>
        <div class="stats-widget">
            <h4 class="stats-title">Patients Discharged</h4>
            <p class="stats-value text-purple-600">8</p>
        </div>
    </div>

    <h2 class="text-xl font-bold mb-4">Ward Admissions</h2>

<table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">Ward</th>
            <th class="border px-4 py-2">Bed Number</th>
            <th class="border px-4 py-2">Patient</th>
            <th class="border px-4 py-2">Doctor</th>
            <th class="border px-4 py-2">Admission Date</th>
            <th class="border px-4 py-2">Nurse</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admissions as $admission)
            <tr>
                <td class="border px-4 py-2">{{ $admission->ward_name ?? $admission->ward->name }}</td>
                <td class="border px-4 py-2">{{ $admission->bed_number ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $admission->patient_name ?? $admission->patient->first_name }}</td>
                <td class="border px-4 py-2">{{ $admission->doctor_name ?? $admission->doctor->name }}</td>
                <td class="border px-4 py-2">{{ $admission->admission_date }}</td>
                {{-- <td class="border px-4 py-2">{{ $admission->nurse_name ?? $admission->nurse->name }}</td> --}}
            </tr>
        @endforeach
    </tbody>
</table>


    </div>
@endsection