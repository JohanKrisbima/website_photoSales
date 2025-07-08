<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Admin</title>
     @vite('resources/css/app.css')
</head>
<body class="flex bg-gray-100 min-h-screen">
    {{-- side bar --}}
    <aside class="w-64 bg-stone-950 text-white flex flex-col p-4">
        <h1 class="text-2xl font-bold mb-6">Admin</h1>
        <nav class="space-y-2">
            <a href="/home" class="block p-2 rounded bg-teal-50 text-stone-950">Dashboard</a>
            <a href="/galeriAdmin" class="block p-2 rounded hover:bg-teal-50 hover:text-stone-950">Galeri Foto</a>
        </nav>
        <div class="mt-auto">
            <a href="{{ route('logout') }}" class="block mt-6 bg-white text-stone-950 px-4 py-2 rounded text-center font-semibold">Logout</a>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1">
        <header class="flex justify-between items-center mb-6 bg-gray-200 p-5">
            <h2 class="text-2xl font-semibold">Dashboard</h2>
            <img src="{{ asset('assets/image/admin.png') }}" alt="user" class="rounded-full w-10 h-10">
        </header>

        <div class="grid grid-cols-2 gap-6">
            <div class="bg-white p-4 rounded shadow ml-10">
                <h3 class="font-semibold">Jumlah Foto</h3>
                <h1>100</h1>
            </div>

            <div class="bg-white p-4 rounded shadow mr-10">
                <h3 class="font-semibold">Jumlah Saldo</h3>
                <h1>Rp, 100.000</h1>
            </div>
        </div>
        
    </main>
</body>
</html>

