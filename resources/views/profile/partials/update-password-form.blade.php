<div style="padding: 20px; max-width: 1400px; margin: 0 auto;">
    <!-- Success Message -->
    @if (session('status') === 'password-updated')
        <div
            style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
            {{ __('Saved.') }}
        </div>
    @endif

    <!-- Password Update Section -->
    <div
        style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
        <!-- Section Header -->
        <div style="margin-bottom: 2rem;">
            <h2 style="color: #2d3748; font-size: 1.25rem; font-weight: 500; margin: 0;">
                <i class="fas fa-lock" style="margin-right: 0.5rem;"></i> {{ __('Update Password') }}
            </h2>
            <p style="color: #718096; font-size: 0.875rem; margin-top: 0.5rem;">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>

        <!-- Password Update Form -->
        <form method="post" action="{{ route('password.update') }}"
            style="display: flex; flex-direction: column; gap: 1.5rem;">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div>
                <label for="update_password_current_password"
                    style="display: block; color: #4a5568; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">
                    {{ __('Current Password') }}
                </label>
                <input type="password" id="update_password_current_password" name="current_password"
                    style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s;"
                    autocomplete="current-password">
                @error('current_password', 'updatePassword')
                    <p style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div>
                <label for="update_password_password"
                    style="display: block; color: #4a5568; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">
                    {{ __('New Password') }}
                </label>
                <input type="password" id="update_password_password" name="password"
                    style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s;"
                    autocomplete="new-password">
                @error('password', 'updatePassword')
                    <p style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="update_password_password_confirmation"
                    style="display: block; color: #4a5568; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">
                    {{ __('Confirm Password') }}
                </label>
                <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                    style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s;"
                    autocomplete="new-password">
                @error('password_confirmation', 'updatePassword')
                    <p style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                @enderror
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
