@extends('layouts.admin')
<style>
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        color: #fff;
        font-size: 36px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        border: 4px solid #f1f1f1;
        text-transform: uppercase;
    }

    .profile-container {
        display: flex;
        gap: 30px;
        justify-content: center;
        align-items: flex-start;
        padding: 40px;
        margin-top: -35px;
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 400px;
        position: relative;
    }

    .profile-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #f1f1f1;
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #fff;
    }

    .card h3 {
        margin-top: 80px;
        margin-bottom: 10px;
        text-align: center;
    }

    .card p {
        text-align: center;
        color: #555;
        margin-bottom: 5px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    .btn-primary {
        background-color: #4A90E2;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #357ABD;
    }

    .input-success {
        border: 2px solid #28a745 !important;
        /* Green border */
    }

    .input-error {
        border: 2px solid #dc3545 !important;
        /* Red border */
    }
</style>
@section('content')
    <main class="main-content">
        @include('layouts.header')
        <div class="content">
            <div class="profile-container">
                <!-- Profile Edit Card -->
                <div class="card">
                    <!-- Display Image -->
                    @php
                        $user = auth()->user();
                        $name = $user->name;
                        $initials = collect(explode(' ', $name))->map(fn($n) => strtoupper($n[0]))->implode('');
                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#3f51b5', '#03a9f4', '#009688', '#4caf50', '#ff9800', '#795548'];
                        $bgColor = $colors[crc32($user->email) % count($colors)];
                    @endphp

                    @if ($user->profile)
                        <img style="margin-top:30px;" src="{{ asset('uploads/adminprofile/' . $user->profile) }}"
                            class="profile-image" alt="Profile Image">
                    @else
                        <div class="profile-avatar" style="background-color: {{ $bgColor }};margin-top:30px;">
                            {{ $initials }}
                        </div>
                    @endif
                    <h3>Edit Profile</h3>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="profile_image">Choose New Profile Image</label>
                            <input type="file" name="profile" id="profile_image" accept="image/*">
                        </div>
                        <button type="submit" class="btn-primary">Update Profile</button>
                    </form>
                </div>

                <!-- Change Password Card -->
                <div class="card">
                    <h3>Change Password</h3>
                    <form action="{{ route('profile.password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password"
                                class="{{ $errors->has('current_password') ? 'input-error' : (old('current_password') ? 'input-success' : '') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password"
                                class="{{ $errors->has('new_password') ? 'input-error' : (old('new_password') ? 'input-success' : '') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                class="{{ $errors->has('new_password_confirmation') ? 'input-error' : (old('new_password_confirmation') ? 'input-success' : '') }}"
                                required>

                        </div>
                        <button type="submit" class="btn-primary">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </main>


@endsection
