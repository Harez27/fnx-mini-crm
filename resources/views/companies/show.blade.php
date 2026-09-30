<x-layouts::app :title="$company->name">
    <div class="mx-auto max-w-3xl">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold">{{ $company->name }}</h1>
            <a href="{{ route('companies.index') }}" class="underline">
                ← Back to Companies
            </a>
        </div>

        <div class="space-y-5 rounded-lg bg-white p-6 shadow" style="color: #18181b;">
            @if ($company->logo)
                <img
                    src="{{ asset('storage/' . $company->logo) }}"
                    alt="{{ $company->name }} logo"
                    class="h-24 w-24 rounded border object-contain"
                >
            @endif

            <div>
                <p class="text-sm" style="color: #52525b;">Company Name</p>
                <p class="font-medium">{{ $company->name }}</p>
            </div>

            <div>
                <p class="text-sm" style="color: #52525b;">Email</p>
                <p>{{ $company->email ?: '—' }}</p>
            </div>

            <div>
                <p class="text-sm" style="color: #52525b;">Website</p>
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
                    <p>—</p>
                @endif
            </div>

            <div>
                <p class="text-sm" style="color: #52525b;">Employees</p>
                <p>{{ $company->employees()->count() }}</p>
            </div>

            <a
                href="{{ route('companies.edit', $company) }}"
                class="inline-block rounded px-4 py-2 font-medium"
                style="background-color: #2563eb; color: white;"
            >
                Edit Company
            </a>
        </div>
    </div>
</x-layouts::app>