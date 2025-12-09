@extends('layouts.sideBar')

@section('content')
    <div class="dash-con">
    <!-- Search Bar -->
<div class="search-bar">
    <form action="{{ route('patients.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search for patients..." 
               value="{{ request('search') }}" class="search-input">
        <button type="submit" class="search-button">Search</button>
    </form>
</div>

    <!-- Summary Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <h4 class="stat-title">Today's Visits</h4>
            <p class="stat-value">2</p>
        </div>
        <div class="stat-card">
            <h4 class="stat-title">Total Patients</h4>
            <p class="stat-value">{{ $totalPatients }}</p>
            <div class="flex justify-center my-6">
            <a href="{{ route('patients.create') }}" class="add-button">
                ➕ Add Patient
            </a>
            </div>
        </div>

        <div class="stat-card">
            <h4 class="stat-title">Today's Admissions</h4>
            <p class="stat-value">5</p>
        </div>
        <div class="stat-card">
            <h4 class="stat-title">Patients Insured</h4>
            <p class="stat-value">30</p>
        </div>
    </div>

    <!-- Patients Table -->
    <div class="table-container">
        <table class="patients-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Number</th>
                    <th>Address</th>
                </tr>
            </thead>
<tbody>
        @forelse ($patients as $patient)
            <tr>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ \Carbon\Carbon::parse($patient->dob)->format('d M Y') }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->contact }}</td>
                <td>{{ $patient->address }}</td>
                <td>
                    <a href="{{ route('patients.show', $patient->id) }}" class="view-button">
                        View Profile
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-red-500">!!! NO RECORDS AVAILABLE</td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>

    <div class="my-6">
    {{ $patients->links() }}
    </div>

</div>
@endsection