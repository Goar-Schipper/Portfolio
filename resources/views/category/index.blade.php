<x-guest-layout>
    @vite(['resources/css/app.css'])
    <body>
    <div>
        @foreach($categories as $category)
            {{ $category->title }}<br>
            <p class="mt-auto"><a href="{{ route('categories.edit', $category->id) }}">Edit</a></p>
        @endforeach
    </div>
    </body>
</x-guest-layout>
