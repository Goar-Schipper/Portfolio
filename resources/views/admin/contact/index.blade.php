<x-guest-layout>
@vite(['resources/css/app.css'])
<body class="bg-[#111827]">
<div class="flex items-center flex-wrap gap-12 m-5 justify-center">
@foreach($contacts as $contact)
    <div class="flex list-none flex-col bg-[#2b364d] max-w-full p-3 rounded-3xl">
        <li class="flex gap-9 pb-5">
            <p>Name:</p>
            {{ $contact->name }}
        </li>
        <li class="flex gap-10  pb-5">
            <p>Email:</p>
            {{ $contact->email }}
        </li>
        <li class="flex gap-4  pb-5">
            <p>Message:</p>
            {{ $contact->message }}
        </li>
        <li class="flex gap-3 ">
            <p>Actions:</p>
            <p>
                <form action="{{ route('dashboard.contact.destroy', $contact->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="hover:bg-sky-700 rounded-3xl p-[3px]" type="submit">delete</button>
                </form>
            </p>
        </li>
        <br>
    </div>
@endforeach
</div>
</body>
</x-guest-layout>







