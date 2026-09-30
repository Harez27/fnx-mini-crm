<x-layouts::app :title="__('Employee Details')">
    <div class="mx-auto max-w-2xl">
        <div class="mb-6 flex items-center justify-between gap-4">
            <h1 class="text-2xl font-bold">Employee Details</h1>

            <a href="{{ route('employees.index') }}" class="underline">
                ← Back to Employees
            </a>
        </div>

        <div class="space-y-5 rounded-lg bg-white p-6 shadow" style="color: #18181b;">
            <div>
                <p class="text-sm" style="color: #52525b;">Full Name</p>
                <p class="font-medium">
                    {{ $employee->first_name }} {{ $employee->last_name }}
                </p>
            </div>

            <div>
                <p class="text-sm" style="color: #52525b;">Company</p>
                <p>{{ $employee->company->name }}</p>
            </div>

            <div>
                <p class="text-sm" style="color: #52525b;">Email</p>
                <p>{{ $employee->email ?: '—' }}</p>
            </div>

            <div>
                <p class="text-sm" style="color: #52525b;">Phone</p>
                <p>{{ $employee->phone ?: '—' }}</p>
            </div>

            <a
                href="{{ route('employees.edit', $employee) }}"
                class="inline-block rounded px-4 py-2 font-medium"
                style="background-color: #2563eb; color: white;"
            >
                Edit Employee
            </a>
        </div>
    </div>
</x-layouts::app>