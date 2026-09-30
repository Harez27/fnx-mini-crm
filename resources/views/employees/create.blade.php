<x-layouts::app :title="__('Add Employee')">
    <div class="mx-auto max-w-2xl">
        <h1 class="mb-6 text-2xl font-bold">Add Employee</h1>

        <form
            action="{{ route('employees.store') }}"
            method="POST"
            class="space-y-5 rounded-lg bg-white p-6 shadow"
            style="color: #18181b;"
        >
            @csrf

            <div>
                <label for="first_name" class="mb-1 block font-medium">
                    First Name *
                </label>
                <input
                    id="first_name"
                    name="first_name"
                    type="text"
                    value="{{ old('first_name') }}"
                    required
                    class="w-full rounded border border-gray-300 p-2"
                    style="color: #18181b; background-color: white;"
                >
                @error('first_name')
                    <p class="mt-1 text-sm" style="color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="mb-1 block font-medium">
                    Last Name *
                </label>
                <input
                    id="last_name"
                    name="last_name"
                    type="text"
                    value="{{ old('last_name') }}"
                    required
                    class="w-full rounded border border-gray-300 p-2"
                    style="color: #18181b; background-color: white;"
                >
                @error('last_name')
                    <p class="mt-1 text-sm" style="color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="company_id" class="mb-1 block font-medium">
                    Company *
                </label>
                <select
                    id="company_id"
                    name="company_id"
                    required
                    class="w-full rounded border border-gray-300 p-2"
                    style="color: #18181b; background-color: white;"
                >
                    <option value="">Select a company</option>
                    @foreach ($companies as $company)
                        <option
                            value="{{ $company->id }}"
                            @selected(old('company_id') == $company->id)
                        >
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
                @error('company_id')
                    <p class="mt-1 text-sm" style="color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="mb-1 block font-medium">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    class="w-full rounded border border-gray-300 p-2"
                    style="color: #18181b; background-color: white;"
                >
                @error('email')
                    <p class="mt-1 text-sm" style="color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="mb-1 block font-medium">Phone</label>
                <input
                    id="phone"
                    name="phone"
                    type="tel"
                    value="{{ old('phone') }}"
                    class="w-full rounded border border-gray-300 p-2"
                    style="color: #18181b; background-color: white;"
                >
                @error('phone')
                    <p class="mt-1 text-sm" style="color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3">
                <button
                    type="submit"
                    class="rounded px-4 py-2 font-medium"
                    style="background-color: #2563eb; color: white;"
                >
                    Save Employee
                </button>

                <a
                    href="{{ route('employees.index') }}"
                    style="color: #374151; text-decoration: underline;"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layouts::app>