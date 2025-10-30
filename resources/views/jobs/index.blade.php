<x-layout>

    <div class="space-y-10 pt-6">
        {{-- Header --}}

        <section class="text-center">
            <h1 class="font-bold text-4xl mb-6">Let's Find Your Next Job</h1>
            <x-forms.form action="/search" class="mt-6">
                <x-forms.input :label="false" name="q" placeholder="Web Developer..." />
            </x-forms.form>
        </section>



        {{-- Jobs --}}
        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach ($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>




        {{-- Tags --}}
        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">
                @foreach ($tags as $tag)
                    <x-tag :tag="$tag" />
                @endforeach

            </div>
        </section>

        {{-- Recent Jobs --}}
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
        </section>
        <div class="mt-6 space-y-6">
            @foreach ($jobs as $job)
                <x-job-card-wide :$job />
            @endforeach

        </div>

    </div>


</x-layout>
