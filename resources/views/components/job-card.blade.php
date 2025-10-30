@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm text-gray-500">{{ $job->employer->name }}</div>

    @if ($job->image)
        <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->title }}"
            class="w-full h-48 object-cover rounded-xl mt-4">
    @else
        <img src="{{ asset('images/default-job.jpg') }}" alt="Default Job Image"
            class="w-full h-48 object-cover rounded-xl mt-4">
    @endif

    <div class="py-6">
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
            {{ $job->title }}
        </h3>
        <p class="text-sm mt-4 text-gray-700">{{ $job->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag size="small" :$tag />
            @endforeach
        </div>

        {{-- <x-employer-logo :width="50" /> --}}

        @if ($job->employer->logo)
            <img src="{{ asset('storage/' . $job->employer->logo) }}" class="rounded-md" style="width:50px"
                alt="{{ $job->employer->name }}">
        @else
            <img src="{{ asset('images/default-employer.jpg') }}" class="rounded-md" style="width:50px"
                alt="Default Employer Logo">
        @endif
    </div>
</x-panel>
