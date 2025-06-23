<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-blue-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            {{-- Profile Information --}}
            <section class="bg-white shadow-md rounded-xl p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Update Profile Information</h3>
                <div class="mt-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            {{-- Update Password --}}
            <section class="bg-white shadow-md rounded-xl p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Change Password</h3>
                <div class="mt-4">
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            {{-- Delete Account --}}
            <section class="bg-red-50 border border-red-200 shadow-md rounded-xl p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-red-700 mb-4 border-b border-red-300 pb-2">Delete Account</h3>
                <p class="text-sm text-red-600 mb-4">Once your account is deleted, all of its resources and data will be permanently lost. Please be sure.</p>
                <div class="mt-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
