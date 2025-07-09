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
            <a href="/dashboard" class="block p-2 rounded hover:bg-teal-50 hover:text-stone-950">Dashboard</a>
            <a href="/galeriAdmin" class="block p-2 rounded bg-teal-50 text-stone-950">Galeri Foto</a>
        </nav>
        <div class="mt-auto">
            <a href="{{ route('logout') }}" class="block mt-6 bg-white text-stone-950 px-4 py-2 rounded text-center font-semibold">Logout</a>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1">
        <header class="flex justify-between items-center mb-6 bg-gray-200 p-5">
            <h2 class="text-2xl font-semibold">Galeri Foto</h2>
            <img src="{{ asset('assets/image/admin.png') }}" alt="user" class="rounded-full w-10 h-10">
        </header>

        <a href="/admin/input"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 ml-6 rounded-lg text-sm-2 mt-3">Tambah Data</button></a>

        {{-- table --}}
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Picture</th>
                        <th class="py-3 px-6 text-left">Judul</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Price</th>
                        <th class="py-3 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($photos as $index => $photo)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index +1 }}</td>
                        <td class="py-3 px-6 text-left ">
                            <div class="relative inline-block w-60 h-auto">
                            <img src="{{ asset('assets/imageProduct/' . $photo->image) }}" 
                                alt="picture" 
                                class="w-60 h-50 object-cover"
                                oncontextmenu="return false;"  
                                ondragstart="return false;" 
                                onmousedown="return false;" 
                                style="pointer-events: none; user-select: none;">

                            <!-- Watermark Gambar -->
                            <img src="{{ asset('assets/imageProduct/povshot.png')}}" 
                                alt="watermark" 
                                class="absolute bottom-2 left-1/2 transform -translate-x-1/2 w-10 opacity-50 pointer-events-none select-none">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left ">{{ $photo->title }}</td>
                        <td class="py-3 px-6 text-left ">{{ $photo->description }}</td>
                        <td class="py-3 px-6 text-left ">Rp, {{ $photo->price }}</td>
                        <td class="py-3 px-6 text-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">Edit</button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm ml-2">Hapus</button>
                        </td>
                       
                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>

    </main>
</body>
</html>

