<x-layout>
    <x-page-heading>Companies</x-page-heading>

    <div class="mt-10 px-6">
        <div class="overflow-x-auto w-full">
            <table class="w-full border-2 border-blue-600 bg-gray-800 text-gray-200 rounded-lg shadow-lg">
                <thead class="bg-gray-900 border-b-2 border-blue-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-white-400">Logo</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-white-400">Company Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-white-400">Jobs Count</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-white-400">Latest Job</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-white-400">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($companies as $company)
                        <tr class="border-t border-blue-600 hover:bg-gray-700 transition">
                            <td class="px-6 py-3">
                                @if ($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"
                                        class="w-8 h-8 rounded-md object-cover border border-blue-500">
                                @else
                                    <img src="{{ asset('images/default-employer.png') }}"
                                        class="w-10 h-10 rounded-md object-cover border border-blue-500">
                                @endif
                            </td>

                            <td class="px-6 py-3 font-semibold text-white">{{ $company->name }}</td>

                            <td class="px-6 py-3 text-white-300">{{ $company->jobs->count() }}</td>

                            <td class="px-6 py-3">
                                @if ($company->jobs->count() > 0)
                                    <a href="#" class="text-white-400 hover:underline" target="_blank">
                                        {{ $company->jobs->last()->title }}
                                    </a>
                                @else
                                    <span class="text-gray-500">No Jobs</span>
                                @endif
                            </td>

                            <td class="px-6 py-3 flex space-x-2">
                                <a href="{{ route('companies.edit', $company->id) }}"
                                    class="px-3 py-1 rounded-md bg-blue-600 text-sm hover:bg-blue-700">Edit</a>

                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="px-3 py-1 bg-red-600 rounded-md text-sm hover:bg-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex justify-center">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</x-layout>
