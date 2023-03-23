<x-guest_layout>
    <h1>Update</h1>
    <form class="text-black" action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $category->title }}">
        <button type="submit">submit</button>
    </form>
</x-guest_layout>
