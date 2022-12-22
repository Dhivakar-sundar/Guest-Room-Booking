<x-guest-layout>
    <style>
         #radio{
        display: flex;
 }
    </style>
    <x-auth-card>
    <h1 style="text-align: center; font-weight: bold;font-size:20px;">CUSTOMER REGISTER</h1>
        <x-slot name="logo">
        <img src="{{ asset('images/houses-logo-vector-24291977.jpg') }}" alt="W3Schools.com" style="width:150px;height:142px; border-radius: 50%;">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-label for="mobile" :value="__('mobile')" />

                <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required />
            </div>

            <div class="mt-4">
                <x-label for="address" :value="__('address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>
            <div class="mt-4">
                <x-label for="gender" :value="__('gender')" />
<div id="radio" class="ml-4">
                <x-input id="gender" class="block mt-1" type="radio" name="gender" value="Male" required /> <label for="" class="ml-3">Male</label>
                <x-input id="gender" class="block mt-1 ml-4" type="radio" name="gender" value="Female" required /> <label for="" class="ml-3">Female</label>
                </div>
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
