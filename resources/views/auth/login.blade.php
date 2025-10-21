<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-200 via-white to-indigo-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-8 ring-1 ring-indigo-300 dark:ring-gray-700 backdrop-blur-md transition-all hover:scale-[1.015] duration-300">
            
            <!-- Logo -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-extrabold text-indigo-600 dark:text-indigo-400 tracking-tight">
                    Cửa Hàng Cafe
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Đăng nhập để tiếp tục</p>
            </div>

            <!-- Session status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Địa chỉ Email')" />
                    <x-text-input id="email"
                        class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Mật khẩu')" />
                    <x-text-input id="password"
                        class="mt-2 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Remember me + Forgot -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-600 dark:bg-gray-900 dark:border-gray-700 dark:focus:ring-blue-600"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ghi nhớ đăng nhập') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium">
                            {{ __('Quên mật khẩu?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <div>
                    <x-primary-button
                        class="w-full justify-center py-3 text-base font-semibold rounded-xl bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-500 text-white transition duration-200 ease-in-out shadow-md hover:shadow-lg">
                        {{ __('Đăng nhập') }}
                    </x-primary-button>
                </div>

                <!-- Register -->
                <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Chưa có tài khoản?') }}
                    <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                        {{ __('Đăng ký ngay') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
