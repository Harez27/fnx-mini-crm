<x-layouts::app :title="__('Add Company')">
    <div class="mx-auto max-w-2xl">
        <h1 class="mb-6 text-2xl font-bold">Add Company</h1>

        <form
            action="{{ route('companies.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-5 rounded-lg bg-white p-6 shadow"
            style="color: #18181b;"
        >
            @csrf

            <div>
                <label for="name" class="mb-1 block font-medium">Company Name *</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded border border-gray-300 p-2"
                    style="color: #18181b; background-color: white;"
                >
                @error('name')
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
                <label for="website" class="mb-1 block font-medium">Website</label>
                <input
                    id="website"
                    name="website"
                    type="url"
                    value="{{ old('website') }}"
                    placeholder="https://example.com"
                    class="w-full rounded border border-gray-300 p-2"
                    style="color: #18181b; background-color: white;"
                >
                @error('website')
                    <p class="mt-1 text-sm" style="color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="logo" class="mb-1 block font-medium">Logo</label>
                <input
                    id="logo"
                    name="logo"
                    type="file"
                    accept="image/*"
                    class="w-full rounded border border-gray-300 p-2"
                    style="color: #18181b; background-color: white;"
                >
                <p class="mt-1 text-sm" style="color: #52525b;">
                    Optional. Minimum 100 × 100 pixels; maximum 2 MB.
                </p>
                @error('logo')
                    <p class="mt-1 text-sm" style="color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3">
                <button
                    type="submit"
                    class="rounded px-4 py-2 font-medium"
                    style="background-color: #2563eb; color: white;"
                >
                    Save Company
                </button>

                <a href="{{ route('companies.index') }}"
                   style="color: #374151; text-decoration: underline;">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layouts::app>