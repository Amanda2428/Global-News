<x-auth-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <!-- <div class="mt-4">
            <x-input-label for="profile_picture" :value="__('Profile Picture')" class="mb-2"/>
            <form>
                <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                            <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="https://lh3.googleusercontent.com/a-/AFdZucpC_6WFBIfaAbPHBwGM9z8SxyM1oV4wB4Ngwp_UyQ=s96-c" alt="Current profile photo" />
                        </div>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" onchange="loadFile(event)" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 " />
                    </label>
                </div>
            </form>
        </div> -->
       

        <div class="mt-4 ">
            <x-input-label for="subscribed" :value="__('Are you subscribed?')" />
            <div class="flex  space-x-4 mt-4 ">
                <label class="flex items-center space-x-2 mr-5">
                    <input type="radio" id="subscribed_yes" name="subscribed" value="1" class="rounded text-indigo-600 focus:ring-indigo-500" required />
                    <span class="text-white">{{ __('Yes') }}</span>
                </label>
                <label class="flex items-center space-x-2 ml-5">
                    <input type="radio" id="subscribed_no" name="subscribed" value="0" class="rounded text-indigo-600 focus:ring-indigo-500" required />
                    <span class="text-white">{{ __('No') }}</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('subscribed')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 ">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-layout>