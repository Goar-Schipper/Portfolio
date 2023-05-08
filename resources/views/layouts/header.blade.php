<header class="mobile:hidden w-full flex items-center bg-[#0c111b] h-20">
    <div class="flex gap-5 pl-5 ">
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

<div class="hidden mobile:block mobile:p-5 mobile:h-5 mobile:w-5 mobile:bg-[#0c111b] mobile:w-full mobile:pb-10">
    <div id="leftMenu">
        <a href="javscript:void(0)" class="btn-area" onclick="closeBtn()">×</a>
        <div class="mainNav flex flex-col items-center">
            @auth
                <a href="{{ route("admin") }}">Admin</a>
            @endauth
            <a href="/">Home</a>
            <a href="{{ route("projects.index") }}">PROJECTS</a>
            <a href="{{ route("contact.index") }}">Contact</a>
            <a href="{{ route("login") }}"><p class="@auth hidden @endauth">Login</p></a>
            <a class="hover:bg-sky-700 rounded-3xl p-2" href="{{('/admin')}}">Admin</a>
                <form class="hover:bg-sky-700 rounded-3xl p-2" method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @auth
                <form action="/logout" method="post" class="inline">
                    @csrf
                    <button type="submit" class="z-2 tracking-widest font-semibold text-white mt-auto">
                        LOGOUT
                    </button>
                </form>
            @endauth
        </div>
    </div>
    <span class="text-white lg:hidden block" onclick="openBtn()">☰</span>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function openBtn() {
            document.getElementById("leftMenu").style.width = "250px";
        }

        function closeBtn() {
            document.getElementById("leftMenu").style.width = "0";
        }
    </script>
</div>
