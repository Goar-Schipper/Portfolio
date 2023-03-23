<x-guest-layout>
    <div >
   <form class="text-black flex w-full justify-center" action="{{ route('categories.store') }}" method="post">
       @csrf
          <input type="text" name="title">
            <button class="bg-[#111827] hover:bg-[#0c111b] text-white font-bold py-2 px-4 border-b-4 rounded"
            type="submit">submit
            </button>
        </form>
    </div>
</x-guest-layout>
