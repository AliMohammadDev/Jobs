@props(['job'])
<x-panel class="flex gap-x-6">

    <div>
        {{-- <x-employer-logo :width="100" /> --}}
        @if ($job->employer->logo)
            <img src="{{ asset('storage/' . $job->employer->logo) }}" class="rounded-md" style="width:50px"
                alt="{{ $job->employer->name }}">
        @else
            <img src="{{ asset('images/default-employer.jpg') }}" class="rounded-md" style="width:50px"
                alt="Default Employer Logo">
        @endif
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400">{{ $job->employer->name }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">{{ $job->title }}
        </h3>
        <p class="text-sm text-gray-400 mt-auto">{{ $job->salary }}</p>
    </div>


    <div>
        @foreach ($job->tags as $tag)
            <x-tag size="small" :$tag />
        @endforeach
    </div>

</x-panel>
