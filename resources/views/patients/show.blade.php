@extends('layouts.sideBar')

@section('content')
<div class="dash-con">
       <!-- Welcome Banner -->
    <div class="PM-banner">
        <h2 class="text-3xl font-bold mb-2">Profile Management on {{ $patient->first_name }}👋</h2>
        <p class="text-sm">Viewing a patient in ForeverCare. Use this section to manage patient's records available.</p>
    </div>

<div x-data="{ activeTab: 'general' }" class="account-settings-container">

    <!-- Sidebar Tabs -->
    <div class="settings-sidebar">
        <h2 class="settings-title">Profile Settings</h2>
        <p class="settings-subtitle ">Manage patient information and settings</p>
        <ul class="settings-tabs">
            <li @click="activeTab = 'general'" :class="{ 'tab.active': activeTab === 'general' }" class="tab">General Information</li>
            <li @click="activeTab = 'edit'" :class="{ 'tab.active': activeTab === 'edit' }" class="tab">Edit Profile Information</li>
        </ul>
    </div>

    <!-- Right Panel -->
    <div class="settings-form">

        <!-- General Info -->
        <div x-show="activeTab === 'general'">
            <h3 class="form-title">Profile Information</h3>
            <p class="form-subtitle">Patients Records Saved</p>
                <div class="photo-upload">
                <img class="Profile-Photo" src="/.../ " alt="Profile Photo"img>
                <button type="button" class="photo-button">Select Photo</button>
        </div>
        <div class="profile-info">
            <p><strong>Name:</strong> {{ $patient->first_name }} {{ $patient->last_name }}</p>
            <p><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($patient->dob)->format('d M Y') }}</p>
            <p><strong>Gender:</strong> {{ $patient->gender }}</p>
            <p><strong>Contact:</strong> {{ $patient->contact }}</p>
            <p><strong>Address:</strong> {{ $patient->address }}</p>
        </div>
    </div>

        <!-- Edit Form -->
        <div x-show="activeTab === 'edit'">
            <h3 class="text-lg font-semibold mb-4">Edit Profile</h3>
            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium">First Name</label>
                    <input type="text" name="first_name" value="{{ $patient->first_name }}" class="form-input">
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium">Last Name</label>
                    <input type="text" name="last_name" value="{{ $patient->last_name }}" class="form-input">
                </div>

                <div class="mb-4">
                    <label for="dob" class="block text-sm font-medium">Date of Birth</label>
                    <input type="date" name="dob" value="{{ $patient->dob }}" class="form-input">
                </div>

                <div class="mb-4">
                    <label for="contact" class="block text-sm font-medium">Contact</label>
                    <input type="text" name="contact" value="{{ $patient->contact }}" class="form-input">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium">Address</label>
                    <input type="text" name="address" value="{{ $patient->address }}" class="form-input">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
            </form>
            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Delete Patient
                    </button>
            </form>
        </div>

    </div>
</div>
@endsection


</div>
 