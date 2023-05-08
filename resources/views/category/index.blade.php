<x-guest-layout>
    @vite(['resources/css/app.css'])
    <body>
    <div>
        @foreach($categories as $category)
            <div class="pl-5 pt-5">{{ $category->title }}<br></div>
            <div class="flex gap-5 pb-5 pl-5">
                <p class="mt-auto"><a href="{{ route('categories.edit', $category->id) }}">Edit</a></p>
                <form action="{{ route('categories.delete', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach    </div>
    </body>
</x-guest-layout>
