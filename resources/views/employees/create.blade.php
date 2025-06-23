<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-blue-800 leading-tight">Add New Employee</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-2xl mx-auto">
        <form action="{{ route('employees.store') }}" method="POST" class="bg-white p-6 shadow rounded space-y-4">
            @csrf

            <x-input-label for="name" value="Name" />
            <x-text-input id="name" name="name" type="text" class="w-full" required />

            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="w-full" required />

            <x-input-label for="position" value="Position" />
            <x-text-input id="position" name="position" type="text" class="w-full" required />

            <x-input-label for="salary" value="Salary" />
            <x-text-input id="salary" name="salary" type="number" step="0.01" class="w-full" required />

            <x-primary-button class="bg-blue-600">Save</x-primary-button>
            <a href="{{ route('employees.index') }}" class="text-gray-600 ml-3">Cancel</a>
        </form>
    </div>
</x-app-layout>
