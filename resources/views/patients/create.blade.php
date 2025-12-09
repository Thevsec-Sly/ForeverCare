@extends('layouts.sideBar')

@section('content')
<div class="dash-con">
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Add New Patient</h2>

    <form action="{{ route('patients.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="first_name" class="block text-sm font-medium">First Name</label>
            <input type="text" name="first_name" class="form-input">
        </div>

        <div>
            <label for="last_name" class="block text-sm font-medium">Last Name</label>
            <input type="text" name="last_name" class="form-input">
        </div>

        <div>
            <label for="dob" class="block text-sm font-medium">Date of Birth</label>
            <input type="date" name="dob" class="form-input">
        </div>

        <div>
            <label for="gender" class="block text-sm font-medium">Gender</label>
            <select name="gender" class="form-input">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div>
            <label for="contact" class="block text-sm font-medium">Contact</label>
            <input type="text" name="contact" class="form-input">
        </div>

        <div>
            <label for="prescription" class="block text-sm font-medium">Prescription</label>
            <textarea name="prescription" class="form-input">{{ old('prescription', $patient->prescription ?? '') }}</textarea>
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_admitted" value="1" {{ old('is_admitted', $patient->is_admitted ?? false) ? 'checked' : '' }}>
            <label for="is_admitted" class="text-sm">Admit Patient</label>
        </div>

        <label for="ward_id" class="block font-medium text-sm text-gray-700">Assign Ward</label>
        <select name="ward_id" id="ward_id" class="form-input mt-1 block w-full" required>
            <option value="">-- Select Ward --</option>
            @foreach($wards as $ward)
                <option value="{{ $ward->id }}">{{ $ward->ward_name }}</option>
            @endforeach
        </select>

        <div>
            <label for="address" class="block text-sm font-medium">Address</label>
            <input type="text" name="address" class="form-input">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Save Patient
        </button>
    </form>
</div>
</di>

@endsection