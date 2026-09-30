<x-layouts::app :title="__('Employees')">
    <div class="space-y-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold">Employees</h1>
                <p>Manage employee records.</p>
            </div>

            <a
                href="{{ route('employees.create') }}"
                class="rounded px-4 py-2 font-medium"
                style="background-color: #2563eb; color: white;"
            >
                + Add Employee
            </a>
        </div>

        @if (session('success'))
            <div
                class="rounded border p-4"
                style="border-color: #86efac; background-color: #f0fdf4; color: #166534;"
            >
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg bg-white shadow" style="color: #18181b;">
            <table class="w-full text-left">
                <thead style="background-color: #f4f4f5;">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Company</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Phone</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($employees as $employee)
                        <tr class="border-t" style="border-color: #e4e4e7;">
                            <td class="p-4">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </td>
                            <td class="p-4">{{ $employee->company->name }}</td>
                            <td class="p-4">{{ $employee->email ?: '—' }}</td>
                            <td class="p-4">{{ $employee->phone ?: '—' }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <a
                                        href="{{ route('employees.show', $employee) }}"
                                        style="color: #2563eb;"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('employees.edit', $employee) }}"
                                        style="color: #b45309;"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('employees.destroy', $employee) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this employee?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" style="color: #dc2626;">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center">
                                No employees yet. Click “Add Employee” to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $employees->links() }}
        </div>
    </div>
</x-layouts::app>