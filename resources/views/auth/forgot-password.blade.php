<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Ukwaju</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-light: #ECFF9F;
            --primary-purple: #EDC6FF;
        }

        .custom-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-white min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md animate-fade-in">
        <!-- Logo -->
        <div class="text-center mb-8">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="mx-auto h-16">
        </div>

        <!-- Card Container -->
        <div class="bg-white rounded-2xl custom-shadow p-8">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Reset Password</h2>

            <div class="mb-6 text-sm text-gray-600 text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <div class="mt-2">
                        <x-text-input id="email"
                            class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition-all"
                            type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-[#ECFF9F] to-[#EDC6FF] text-gray-800 font-semibold py-3 px-4 rounded-lg hover:opacity-90 transition-all duration-200 shadow-sm">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to Login Link -->
        <p class="text-center mt-8 text-gray-600">
            <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                ← Back to Login
            </a>
        </p>
    </div>
</body>

</html>
