@extends('layouts.app')

@section('content')
    <div style="background-color: #f7fafc; min-height: 100vh; padding: 3rem 1rem;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <!-- Profile Card Grid -->
            <div style="display: flex; flex-direction: column; gap: 2rem;">
                <!-- Profile Information Section -->
                <div
                    style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); padding: 1.5rem;">
                    <div style="max-width: 36rem;">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Password Update Section -->
                <div
                    style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); padding: 1.5rem;">
                    <div style="max-width: 36rem;">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account Section -->
                <div
                    style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); padding: 1.5rem;">
                    <div style="max-width: 36rem;">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            body {
                background-color: #f7fafc;
            }
        </style>
    @endpush
@endsection
