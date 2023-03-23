<x-guest-layout>
    <div class="flex justify-center h-[400px] items-center flex-row">
        <form class="text-black bg-[#2b364d] rounded-3xl p-5" action="{{ route('projects.store') }}" method="post">
            @csrf
            <p class="text-white font-bold text-xl pl-2">Titel van het Project</p>
            <div class="pb-3">
                <input class="rounded-3xl" type="text" name="title">
            </div>
            <p class="text-white font-bold text-xl pl-2">Beschrijving van het Project</p>
            <div class="pb-2">
                <textarea class="rounded-3xl" name="description" id="" cols=30 rows="1"></textarea>
            </div>
            <p class="text-white font-bold text-xl pl-2">Datum van het Project</p>
            <div class="pb-3">
                <input class="rounded-3xl" type="datetime-local" name="created_at">
            </div>
            <div class="text-white pl-2">
                @foreach($categories as $category)
                    {{ $category->title }}
                    <input class="rounded-3xl" type="checkbox" value="{{ $category->id }}" name="category[]">
                @endforeach
            </div>
            <div class="pt-4 flex justify-end">
                <button class="bg-[#0c111b] hover:bg-sky-700 text-white font-bold py-2 px-4 border-b-4 rounded-3xl " type="submit">submit</button>
            </div>

        </form>
    </div>
</x-guest-layout>
