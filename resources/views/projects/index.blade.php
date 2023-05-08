<x-guest-layout>
    @vite(['resources/css/app.css'])
    <div class="p-5">
        <p>Catogorieën:</p>
        <form method="get">
            @foreach($categories as $category)
                <input type="checkbox" value="{{ $category->id }}" name="categories[]"
                       @if(in_array($category->id, $filter)) checked @endif>{{ $category->title }}<br>
            @endforeach
            <button type="submit">Filter</button>
        </form>
    </div>
    @if(@session('msg'))
        <p>{{ @session('msg') }}</p>
    @endif
    @if(@session('msg2'))
        <p>{{ @session('msg2') }}</p>
    @endif
    <body>
    <div class="flex flex-wrap items-stretch place-items-stretch justify-center gap-20">
        @foreach($projects as $project)
            <div class="w-64 flex pl-3 mr-10 pb-3">
                <div
                    class="flex flex-col w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-[#2b364d] dark:bg-[#2b364d] dark:border-gray-700 dark:hover:bg-sky-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $project->title }}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $project->description }}</p>
                    <p class="text-xs bg-gray-400 max-w-[100px] p-2 rounded-3xl">
                        @foreach($project->categories as $category)
                            {{ $category->title }}<br/>
                        @endforeach
                    </p>
                    <p class="">{{ $project->created_at }}</p>
                    <p class="mt-auto"><a href="{{ route('projects.edit', $project->id) }}">Edit</a></p>
                    <form action="{{ route('projects.delete', $project->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                    <img src="{{ asset('storage/' . $project->image) }}">
                </div>
            </div>
        @endforeach
    </div>
    </body>
</x-guest-layout>







