<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-blue-800 leading-tight">Edit Employee</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-2xl mx-auto">
        <form action="{{ route('employees.update', $employee) }}" method="POST" class="bg-white p-6 shadow rounded space-y-4">
            @csrf @method('PUT')

            <x-input-label for="name" value="Name" />
            <x-text-input id="name" name="name" type="text" class="w-full" value="{{ $employee->name }}" required />

            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="w-full" value="{{ $employee->email }}" required />

            <x-input-label for="position" value="Position" />
            <x-text-input id="position" name="position" type="text" class="w-full" value="{{ $employee->position }}" required />

            <x-input-label for="salary" value="Salary" />
            <x-text-input id="salary" name="salary" type="number" step="0.01" class="w-full" value="{{ $employee->salary }}" required />

            <x-primary-button class="bg-blue-600">Update</x-primary-button>
            <a href="{{ route('employees.index') }}" class="text-gray-600 ml-3">Cancel</a>
        </form>
    </div>
</x-app-layout>
