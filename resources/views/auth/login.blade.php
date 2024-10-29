<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-medium text-sm text-black">Email</label>
            <input id="email" class="block mt-1 w-full border-gray-300 bg-white text-gray-800 rounded-md shadow-sm" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            @if ($errors->get('email'))
                <div class="mt-2 text-red-600">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>



        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-black">Password</label>

            <input id="password" class="block mt-1 w-full border-gray-300 bg-white text-gray-800 rounded-md shadow-sm" type="password" name="password" required autocomplete="current-password" />

            @if ($errors->get('password'))
                <div class="mt-2 text-red-600">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-400 text-gray-600 focus:ring-gray-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>


        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-gray-400 hover:text-gray-600 dark:text-gray-600 dark:hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800 transition duration-150 ease-in-out active:text-black" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif



            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
