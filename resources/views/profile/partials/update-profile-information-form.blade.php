<div style="padding: 20px; max-width: 1400px; margin: 0 auto;">
    <!-- Success Message -->
    @if (session('status') === 'profile-updated')
        <div
            style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
            {{ __('Saved.') }}
        </div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <div
            style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Profile Section -->
    <div
        style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
        <!-- Section Header -->
        <div style="margin-bottom: 2rem;">
            <h2 style="color: #2d3748; font-size: 1.25rem; font-weight: 500; margin: 0;">
                <i class="fas fa-user" style="margin-right: 0.5rem;"></i> {{ __('Profile Information') }}
            </h2>
            <p style="color: #718096; font-size: 0.875rem; margin-top: 0.5rem;">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>

        <!-- Verification Form -->
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <!-- Main Profile Form -->
        <form method="post" action="{{ route('profile.update') }}"
            style="display: flex; flex-direction: column; gap: 1.5rem;">
            @csrf
            @method('patch')

            <!-- Name Input -->
            <div>
                <label for="name"
                    style="display: block; color: #4a5568; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">
                    {{ __('Name') }}
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                    style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s;"
                    required autofocus autocomplete="name">
                @error('name')
                    <p style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Input -->
            <div>
                <label for="email"
                    style="display: block; color: #4a5568; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">
                    {{ __('Email') }}
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s;"
                    required autocomplete="username">
                @error('email')
                    <p style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div style="margin-top: 0.5rem;">
                        <p style="color: #2d3748; font-size: 0.875rem;">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification"
                                style="color: #4a5568; text-decoration: underline; font-size: 0.875rem; background: none; border: none; cursor: pointer; padding: 0;">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p style="color: #48bb78; font-size: 0.875rem; font-weight: 500; margin-top: 0.5rem;">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1rem;">
                <button type="submit"
                    style="background-color: #4299e1; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s;">
                    <i class="fas fa-save" style="margin-right: 0.5rem;"></i> {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush
