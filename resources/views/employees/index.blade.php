<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-blue-800 leading-tight text-center">Manage Employees</h2>
    </x-slot>

    <div class="py-6 px-4">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded max-w-4xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        {{-- Top Bar: Search + Buttons --}}
        <div class="max-w-4xl mx-auto mb-6">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">

                {{-- Live Search --}}
                <form method="GET" id="searchForm" class="w-full sm:w-auto flex items-center gap-2">
                    <input type="text" name="search" id="liveSearch" value="{{ $search }}" placeholder="Search..."
                        class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </form>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-2 justify-end">
                    <a href="{{ route('employees.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-black font-semibold px-5 py-2 rounded-lg shadow transition">
                        + Add Employee
                    </a>
                    <a href="{{ route('employees.export.csv') }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-5 py-2 rounded-lg shadow transition">
                        Download CSV
                    </a>
                </div>
            </div>
        </div>

        {{-- Employee Table --}}
        <div class="max-w-6xl mx-auto overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        @foreach ([
    'id' => 'ID',
    'name' => 'Name',
    'email' => 'Email',
    'position' => 'Position',
    'salary' => 'Salary',
    'created_at' => 'Created At',
    'updated_at' => 'Updated At'
] as $field => $label)
    <th class="px-4 py-2 text-left whitespace-nowrap">
        <a href="?search={{ $search }}&sort={{ $field }}&direction={{ $direction === 'asc' ? 'desc' : 'asc' }}">
            {{ $label }} @if($sort === $field) ({{ $direction }}) @endif
        </a>
    </th>
@endforeach

                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($employees as $employee)
                        <tr class="border-b hover:bg-gray-50">
    <td class="px-4 py-2">{{ $employee->id }}</td>
    <td class="px-4 py-2">{{ $employee->name }}</td>
    <td class="px-4 py-2">{{ $employee->email }}</td>
    <td class="px-4 py-2">{{ $employee->position }}</td>
    <td class="px-4 py-2">₹{{ number_format($employee->salary, 2) }}</td>
    <td class="px-4 py-2">{{ $employee->created_at->format('d M Y, h:i A') }}</td>
    <td class="px-4 py-2">{{ $employee->updated_at->format('d M Y, h:i A') }}</td>
    <td class="px-4 py-2 whitespace-nowrap">
        <a href="{{ route('employees.edit', $employee) }}" class="text-blue-600 hover:underline">Edit</a>
        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline-block ml-2"
              onsubmit="return confirm('Delete this employee?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline">Delete</button>
        </form>
    </td>
</tr>

                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center text-gray-500">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6 max-w-4xl mx-auto text-center">
            {{ $employees->links() }}
        </div>
    </div>

    {{-- JavaScript for live search --}}
    <script>
        document.getElementById('liveSearch').addEventListener('input', function () {
            const form = document.getElementById('searchForm');
            clearTimeout(window.searchDelay);
            window.searchDelay = setTimeout(() => {
                form.submit();
            }, 500); // delay search for 500ms
        });
    </script>
</x-app-layout>
