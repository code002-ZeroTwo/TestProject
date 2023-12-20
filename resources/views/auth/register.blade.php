<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <br>

        <!-- address -->
        <div>
            <h5>Address</h5>
        </div>
        <!-- province -->

        <div class="mt-4">
            <x-input-label for="province" :value="__('Province')" />
            <select id="province" class="block mt-1 w-full" name="province" required>
                <option value="">Select a Province</option>
                <option value="province1">Province 1</option>
                <option value="province2">Province 2</option>
                <option value="province3">Province 3</option>
                <option value="Gandaki">Gandaki</option>
                <option value="province5">Province 5</option>
                <option value="karnali">karnali</option>
                <option value="Sudurpashchim">Sudurpashchim</option>
            </select>
            <x-input-error :messages="$errors->get('province')" class="mt-2" />
        </div>



        <!-- District -->
        <div class="mt-4">
            <x-input-label for="district" :value="__('District')" />
            <x-text-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')"
                required  />
            <x-input-error :messages="$errors->get('district')" class="mt-2" />
        </div>

        <!-- Municipality -->
        <div class="mt-4">
            <x-input-label for="municipality" :value="__('Municipality')" />
            <x-text-input id="municipality" class="block mt-1 w-full" type="text" name="municipality"
                :value="old('municipality')" required  />
            <x-input-error :messages="$errors->get('municipality')" class="mt-2" />
        </div>

        <!-- ward -->
        <div class="mt-4">
            <x-input-label for="ward" :value="__('Ward')" />
            <x-text-input id="ward" class="block mt-1 w-full" type="number" name="ward" :value="old('ward')" required
                 />
            <x-input-error :messages="$errors->get('ward')" class="mt-2" />
        </div>
        <br>
        <div>
            <h5>Disability Details </h5>
        </div>

        <!-- Type of Disability -->

        <!-- ON the basis of severity -->
        <div class="mt-4">
            <x-input-label for="severity" :value="__('Severity of Disability')" />
            <select id="severity" class="block mt-1 w-full" name="severity" required>
                <option value="">Select severity of disability</option>
                <option value="low">low</option>
                <option value="mid">mid</option>
                <option value="high">high</option>
            </select>
            <x-input-error :messages="$errors->get('province')" class="mt-2" />
        </div>

        <!-- ON the basis of nature -->
        <div>
            <x-input-label for="nature" :value="__('Nature of Disability')" />
            <x-text-input id="nature" class="block mt-1 w-full" type="text" name="nature" :value="old('nature')"
                required autofocus autocomplete="nature" />
            <x-input-error :messages="$errors->get('nature')" class="mt-2" />
        </div>

        <br>

        <div class="mt-4">
            <x-input-label for="dob" :value="__('Date of Birth')" />
            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="citizenship" :value="__('Citizenship Number')" />
            <x-text-input id="citizenship" class="block mt-1 w-full" type="text" name="citizenship"
                :value="old('citizenship')" required />
            <x-input-error :messages="$errors->get('citizenship')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="sex" :value="__('Sex')" />
            <select id="sex" class="block mt-1 w-full" name="sex" required>
                <option value="">Select a Sex</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="blood_group" :value="__('Blood Group')" />
            <select id="blood_group" class="block mt-1 w-full" name="blood_group" required>
                <option value="">Select a Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
            </select>
            <x-input-error :messages="$errors->get('blood_group')" class="mt-2" />
        </div>


        <!-- Name of Guardian -->
        <div>
            <x-input-label for="name_of_guardian" :value="__('Name of guardian')" />
            <x-text-input id="name_of_guardian" class="block mt-1 w-full" type="text" name="name_of_guardian"
                :value="old('name_of_guardian')" required autofocus autocomplete="name_of_guardian" />
            <x-input-error :messages="$errors->get('name_of_guardian')" class="mt-2" />
        </div>

        <!-- Email Address -->

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>