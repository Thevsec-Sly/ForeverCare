@extends('layouts.sideBar')

@section('content')
<div class="dash-con">

    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <h2 class="text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->name }} 👋</h2>
        <p class="text-sm">You're logged into ForeverCare. Use the sidebar to manage patients, admissions, drugs, and more.</p>
    </div>

    <!-- Feature Highlights -->
    <div class="feature-con">
        <div class="feature-card">
            <div class="flex items-center space-x-3">
                <span class="feature-icon text-blue-500">🧑‍⚕️</span>
                <h3 class="feature-title">Patients</h3>
            </div>
            <p class="feature-description">Add, view, and manage patient records and profiles.</p>
        </div>

        <div class="feature-card">
            <div class="flex items-center space-x-3">
                <span class="feature-icon text-green-500">🏥</span>
                <h3 class="feature-title">Admissions</h3>
            </div>
            <p class="feature-description">Track current admissions and discharge summaries.</p>
        </div>

        <div class="feature-card">
            <div class="flex items-center space-x-3">
                <span class="feature-icon text-red-500">💊</span>
                <h3 class="feature-title">Drugs</h3>
            </div>
            <p class="feature-description">Manage prescriptions, inventory, and dispensing logs.</p>
        </div>

        <div class="feature-card">
            <div class="flex items-center space-x-3">
                <span class="feature-icon text-purple-500">📄</span>
                <h3 class="feature-title">Insurances</h3>
            </div>
            <p class="feature-description">View insurance coverage and claim statuses.</p>
        </div>
    </div>

    <!-- Quick Stats Widget -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <div class="stats-widget">
            <h4 class="stats-title">Total Patients</h4>
            <p class="stats-value text-blue-600">{{ $totalPatients }}</p>
        </div>
        <div class="stats-widget">
            <h4 class="stats-title">Admissions Today</h4>
            <p class="stats-value text-green-600">{{ $admissionsToday }}</p>
        </div>
        <div class="stats-widget">
            <h4 class="stats-title">Pending Claims</h4>
            <p class="stats-value text-purple-600">8</p>
        </div>
    </div>

<!-- Recent Patients -->
<div class="grid grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 gap-6 mt-2">
    <div class="recent-card">
    <h3 class="recent-heading">Recently Registered Patients</h3>
    <ul class="recent-items">
        @forelse ($recentPatients as $patient)
            <li class="recent-list">🧑‍⚕️<span class="recent-name">{{ $patient->first_name }} </span> — Registered on {{ $patient->created_at->format('M d, Y') }}</li>
        @empty
            <li>No recent patients found.</li>
        @endforelse
    </ul>
</div>

<!-- Recent Drugs -->
<div class="recent-card">
    <h3 class="recent-heading">Recently Added Drugs</h3>
    <ul class="Recent-items">
        @forelse ($recentDrugs as $drug)
            <li class="recent-list">💊 <span class="recent-name">{{ $drug->name }} </span>— Expiry: {{ \Carbon\Carbon::parse($drug->expiry_date)->format('M Y') }}— Stock: <span></span>{{ $drug->stock_quantity }}</li>
        @empty
            <li>No recent drugs found.</li>
        @endforelse
    </ul>
</div>
</div>

</div>
@endsection