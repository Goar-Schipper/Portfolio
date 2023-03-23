<x-guest-layout>
    @vite(['resources/css/app.css'])
    <body>
    <div class="flex flex-wrap items-stretch place-items-stretch justify-center gap-20">
        @foreach($projects as $project)
            <div class="w-64 flex pl-3 mr-10 pb-3">
                <div class="flex flex-col w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-[#2b364d] dark:bg-[#2b364d] dark:border-gray-700 dark:hover:bg-sky-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $project->title }}</h5>
                    <p>{{ $project->image }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $project->description }}</p>
                    <p class="">{{ $project->created_at }}</p>
                    <p class="mt-auto"><a href="{{ route('projects.edit', $project->id) }}">Edit</a></p>
                    <p>
                        @foreach($project->categories as $category)
                            {{ $category->title }}<br/>
                        @endforeach
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    </body>
</x-guest-layout>







