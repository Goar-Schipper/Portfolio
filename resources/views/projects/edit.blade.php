<x-guest_layout>
    <div class="flex justify-center h-[600px] items-center flex-row">
        <form class="text-black" action="{{ route('projects.update', $project->id) }}" method="post">
            @csrf
            @method('PUT')
            <p class="text-white font-bold text-xl">Titel van het Project</p>
            <div>
                <input class="rounded-3xl" type="text" name="title" value="{{ $project->title }}">
            </div>
            <p class="text-white font-bold text-xl">Beschijving van het Project</p>
            <div>
                <textarea class="rounded-3xl" name="description" id="" cols=30 rows="10">{{ $project->description }}</textarea>
            </div>
            <p class="text-white font-bold text-xl">Datum van het Project</p>
            <div>
                <input class="rounded-3xl" type="datetime-local" name="created_at" value="{{ $project->created_at }}">
            </div>
            <p class="text-white font-bold text-xl">Catogorieën van het Project</p>
            <div class="text-white">
                @foreach($categories as $category)
                    {{ $category->title }}
                    <input class="rounded-3xl" type="checkbox" value="{{ $category->id }}"
                           @if($project->categories()->find($category->id)) checked @endif name="category[]">
                @endforeach
            </div>
            <div class="text-white">
                <button class="bg-[#0c111b] hover:bg-[#111827] text-white font-bold py-2 px-4 border-b-4 rounded" type="submit">submit</button>
            </div>
        </form>
    </div>
</x-guest_layout>
