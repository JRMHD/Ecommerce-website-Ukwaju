<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email | Ukwaju</title>
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
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Verify Your Email</h2>

            <div class="mb-6 text-sm text-gray-600 text-center">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-sm text-green-600 text-center">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </p>
                </div>
            @endif

            <div class="mt-6 space-y-4">
                <!-- Resend Verification Email -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-[#ECFF9F] to-[#EDC6FF] text-gray-800 font-semibold py-3 px-4 rounded-lg hover:opacity-90 transition-all duration-200 shadow-sm">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf
                    <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Help Text -->
        <p class="text-center mt-8 text-sm text-gray-600">
            Need help? <a href="#" class="text-purple-600 hover:text-purple-800 font-semibold">Contact Support</a>
        </p>
    </div>
</body>

</html>
