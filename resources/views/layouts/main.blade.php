<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Povshotnbk - @yield('title')</title>
    @vite('resources/css/app.css')
    <style>
    *{
        font-family: 'Georgia', 'Times New Roman', Times, serif;
    }
    </style>
</head>
<body>
    <nav class="bg-stone-950">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                    <!--
                        Icon when menu is closed.

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                        Icon when menu is open.

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex shrink-0 items-center">
                    <img class="h-8 w-auto" src="{{ asset('assets/imageProduct/povshot.png') }}" alt="Your Company" />
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="/" class="rounded-md px-3 py-2 text-sm font-medium 
                         {{ ($title ==='dashboard') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        Dashboard</a>
                        <a href="/galeri" class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ ($title ==='galeri') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        Galeri</a>
                        @if(!Auth::check())
                        <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Login</a>
                        @else
                        <a href="#" class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ ($title ==='history') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        History</a>
                        @endif
                    </div>
                    </div>
                </div>
            
            
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    @if(Auth::check())
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" id="dropdownToggle" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-hidden">
                            <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                            </button>
                        </div>

                        <div id="dropdownMenu" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/" class="block rounded-md px-3 py-2 text-base font-medium
            {{ ($title ==='dashboard') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            Dashboard</a>
            <a href="/galeri" class="block rounded-md px-3 py-2 text-base font-medium 
            {{ ($title ==='galeri') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            Galeri</a>
            @if(!Auth::check())
                <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Login</a>
            @else
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium {{ ($title ==='history') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">History</a>
            @endif
            </div>
        </div>
    </nav>

     @yield('content')

    <script>
         // Toggle Mobile Menu (Hamburger)
        const menuButton = document.querySelector('button[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');

            // Toggle icon open/close
            this.querySelectorAll('svg').forEach(icon => icon.classList.toggle('hidden'));
        });

        const toggleBtn = document.getElementById('dropdownToggle');
        const dropdown = document.getElementById('dropdownMenu');

        toggleBtn.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
        });

        // Optional: Menutup dropdown jika klik di luar
        document.addEventListener('click', function (e) {
            if (!toggleBtn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

       
    </script>


</body>
</html>