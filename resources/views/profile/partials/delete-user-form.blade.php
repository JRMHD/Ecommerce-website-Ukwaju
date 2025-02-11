<div style="padding: 20px; max-width: 1400px; margin: 0 auto;">
    <!-- Delete Account Section -->
    <div
        style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
        <!-- Section Header -->
        <div style="margin-bottom: 2rem;">
            <h2 style="color: #2d3748; font-size: 1.25rem; font-weight: 500; margin: 0;">
                <i class="fas fa-user-times" style="margin-right: 0.5rem;"></i> {{ __('Delete Account') }}
            </h2>
            <p style="color: #718096; font-size: 0.875rem; margin-top: 0.5rem;">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </div>

        <!-- Delete Button -->
        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            style="background-color: #f56565; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s; display: inline-flex; align-items: center;">
            <i class="fas fa-trash-alt" style="margin-right: 0.5rem;"></i> {{ __('Delete Account') }}
        </button>

        <!-- Delete Confirmation Modal -->
        <div x-data="{ show: false }" x-show="show"
            x-on:open-modal.window="if ($event.detail === 'confirm-user-deletion') show = true"
            x-on:close.stop="show = false" x-on:keydown.escape.window="show = false"
            style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center; z-index: 50;">

            <!-- Modal Content -->
            <div
                style="background-color: white; border-radius: 0.5rem; max-width: 500px; width: 90%; position: relative;">
                <form method="post" action="{{ route('profile.destroy') }}" style="padding: 1.5rem;">
                    @csrf
                    @method('delete')

                    <h2 style="color: #2d3748; font-size: 1.25rem; font-weight: 500; margin-bottom: 1rem;">
                        <i class="fas fa-exclamation-triangle" style="margin-right: 0.5rem; color: #f56565;"></i>
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p style="color: #718096; font-size: 0.875rem; margin-bottom: 1.5rem;">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <!-- Password Input -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password" placeholder="{{ __('Password') }}"
                            style="width: 75%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s;">
                        @error('password', 'userDeletion')
                            <p style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Modal Actions -->
                    <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
                        <button type="button" x-on:click="show = false"
                            style="background-color: #718096; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s;">
                            <i class="fas fa-times" style="margin-right: 0.5rem;"></i> {{ __('Cancel') }}
                        </button>
                        <button type="submit"
                            style="background-color: #f56565; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s;">
                            <i class="fas fa-trash-alt" style="margin-right: 0.5rem;"></i> {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush
