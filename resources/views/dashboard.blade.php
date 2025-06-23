<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-blue-800">Welcome, {{ Auth::user()->name }} 👋</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-blue-100 p-6 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold text-blue-700">Dashboard Overview</h3>
                <p class="mt-2 text-gray-700">
                <a href="{{ route('employees.index') }}" class="text-blue-600 underline">Manage Employees</a>
                </p>
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-4 shadow rounded-xl">
                    <h4 class="text-md font-bold">Profile</h4>
                    <p class="text-sm mt-1">View or update your profile details.</p>
                </div>
                <div class="bg-white p-4 shadow rounded-xl">
                    <h4 class="text-md font-bold">Settings</h4>
                    <p class="text-sm mt-1">Manage your account settings securely.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
