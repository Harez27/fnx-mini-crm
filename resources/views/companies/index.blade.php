<x-layouts::app :title="__('Companies')">
    <div class="space-y-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold">Companies</h1>
                <p>Manage companies and view their employee counts.</p>
            </div>

            <a
                href="{{ route('companies.create') }}"
                class="rounded px-4 py-2 font-medium"
                style="background-color: #2563eb; color: white;"
            >
                + Add Company
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

        @if (session('error'))
            <div
                class="rounded border p-4"
                style="border-color: #fca5a5; background-color: #fef2f2; color: #991b1b;"
            >
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg bg-white shadow" style="color: #18181b;">
            <p class="p-4 text-sm" style="color: #52525b;">
                {{ $companies->total() }} records ·
                {{ $companies->perPage() }} per page
            </p>

            <table class="w-full text-left" style="color: #18181b;">
                <thead style="background-color: #f4f4f5;">
                    <tr>
                        <th class="p-4">Company</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Website</th>
                        <th class="p-4">Employees</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($companies as $company)
                        <tr class="border-t" style="border-color: #e4e4e7; color: #18181b;">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    @if ($company->logo)
                                        <img
                                            src="{{ asset('storage/' . $company->logo) }}"
                                            alt="{{ $company->name }} logo"
                                            class="h-10 w-10 rounded border object-contain"
                                        >
                                    @else
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded"
                                            style="background-color: #e4e4e7; color: #3f3f46;"
                                        >
                                            {{ strtoupper(substr($company->name, 0, 1)) }}
                                        </span>
                                    @endif

                                    <span class="font-medium">{{ $company->name }}</span>
                                </div>
                            </td>

                            <td class="p-4">{{ $company->email ?: '—' }}</td>

                            <td class="p-4">
                                @if ($company->website)
                                    <a
                                        href="{{ $company->website }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        style="color: #2563eb; text-decoration: underline;"
                                    >
                                        {{ $company->website }}
                                    </a>
                                @else
                                    —
                                @endif
                            </td>

                            <td class="p-4">{{ $company->employees_count }}</td>

                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <a
                                        href="{{ route('companies.show', $company) }}"
                                        style="color: #2563eb;"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('companies.edit', $company) }}"
                                        style="color: #b45309;"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('companies.destroy', $company) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this company?')"
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
                                No companies yet. Click “Add Company” to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="p-4">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</x-layouts::app>