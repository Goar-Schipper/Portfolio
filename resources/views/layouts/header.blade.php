<header class="w-full flex items-center bg-[#0c111b] h-20">
    <div class="flex gap-5 pl-5">
        <a class="hover:bg-sky-700 rounded-3xl p-2" href="{{('/') }}">Home</a>
        <a class="hover:bg-sky-700 rounded-3xl p-2" href="{{('/contact') }}">Contact Pagina</a>
        <a class="hover:bg-sky-700 rounded-3xl p-2" href="{{('/projects')}}">Project View</a>
        <a class="hover:bg-sky-700 rounded-3xl p-2" href="{{('/admin')}}">Admin</a>

    </div>
    <div class="flex items-center gap-5 ml-auto pr-5">
        <form class="hover:bg-sky-700 rounded-3xl p-2" method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <a class="hover:bg-sky-700 rounded-3xl p-2" href="{{('/login')}}">Log In</a>
        <a class="hover:bg-sky-700 rounded-3xl p-2" href="{{('/register')}}">Register</a>
    </div>
</header>
