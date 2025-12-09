@extends('layouts.sideBar')

@section('content')
    <div class="dash-con">
    <!-- Search Bar -->
<div class="search-bar">
    <form action="{{ route('drugs.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search for drugs..." 
               value="{{ request('search') }}" class="search-input">
        <button type="submit" class="search-button">Search</button>
    </form>
</div>

    <!-- Summary Stats -->
    <div class="stats-grid">
        <div class="stat-card text-blue-600">
            <h4 class="stat-title">Today's Visits</h4>
            <p class="stat-value">2</p>
        </div>
        <div class="stat-card text-blue-600">
            <h4 class="stat-title">Total Drugs Available</h4>
            <p class="stat-value">{{ $totalDrugs }}</p>
            <div class="flex justify-center mt-2">
            <a href="{{ route('drugs.create') }}" class="add-button">
                ➕ Add Drugs
            </a>
            </div>
        </div>

        <div class="stat-card text-green-600">
            <h4 class="stat-title">Today's Admissions</h4>
            <p class="stat-value">5</p>
        </div>
        <div class="stat-card text-purple-600">
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
                    <th>Size</th>
                    <th>Expiry Date</th>
                    <th>Stock Available</th>
                    {{-- <th>Address</th> --}}
                </tr>
            </thead>
<tbody>
        @forelse ($drugs as $drug)
            <tr>
                <td>{{ $drug->name }}</td>
                {{-- <td>{{ \Carbon\Carbon::parse($patient->dob)->format('d M Y') }}</td> --}}
                <td>{{ $drug->size }}</td>
                <td>{{ $drug->expiry_date }}</td>
                <td>{{ $drug->stock }}</td>
                <td>
                    <a href="{{ route('drugs.show', $drug->id) }}" class="view-button">
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
    {{ $drugs->links() }}
    </div>

</div>
@endsection