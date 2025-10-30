<x-layout>
    <x-page-heading>Edit Company</x-page-heading>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Company Name</label>
            <input type="text" name="name" value="{{ old('name', $company->name) }}"
                class="w-full px-3 py-2 rounded-md bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Logo</label>
            <input type="file" name="logo" class="block w-full text-sm text-gray-300">
            @if ($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="w-8 mt-2 rounded-md">
            @endif
            @error('logo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md hover:bg-blue-700">Update</button>
    </form>
</x-layout>
