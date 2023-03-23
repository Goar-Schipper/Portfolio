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
    <!-- Dropdown menu -->
    <div id="dropdownBgHover" class="z-10 hidden w-48 bg-white rounded-lg shadow dark:bg-gray-700">
        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">
            <li>
                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="checkbox-item-4" type="checkbox" value=""
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-4"
                           class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Default
                        checkbox</label>
                </div>
            </li>
            <li>
                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input checked id="checkbox-item-5" type="checkbox" value=""
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-5"
                           class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Checked
                        state</label>
                </div>
            </li>
            <li>
                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="checkbox-item-6" type="checkbox" value=""
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-6"
                           class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Default
                        checkbox</label>
                </div>
            </li>
        </ul>
    </div>

    <body>
    <div class="flex flex-wrap items-stretch place-items-stretch justify-center gap-20">
        @foreach($projects as $project)
            <div class="w-64 flex pl-3 mr-10 pb-3">
                <div
                    class="flex flex-col w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-[#2b364d] dark:bg-[#2b364d] dark:border-gray-700 dark:hover:bg-sky-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $project->title }}</h5>
                    <p>{{ $project->image }}</p>
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
                </div>
            </div>
        @endforeach
    </div>
    </body>
</x-guest-layout>







