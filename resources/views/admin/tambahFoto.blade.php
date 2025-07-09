<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Photo</title>
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
            <img src="{{ asset('assets/image/povshot.png') }}" alt="" class=" w-20 h-10">
            <img src="{{ asset('assets/image/admin.png') }}" alt="user" class="rounded-full w-10 h-10">
        </header>
        <a href="{{ url()->previous() }}" 
            class="inline-flex items-center mb-4 text-blue-600 hover:text-blue-800 font-semibold transition duration-200 ml-5">
                ← Kembali
        </a>
       <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Upload Foto</h2>
            <form method="POST" action="{{ route('storePhoto') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-gray-600 mb-1" for="title">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        placeholder="Masukkan judul foto"
                        required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                </div>

                <div>
                    <label class="block text-gray-600 mb-1" for="title">Description</label>
                    <input 
                        type="text" 
                        name="description" 
                        id="description" 
                        placeholder="Masukkan Deskripsi Foto"
                        required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                </div>

                <div>
                    <label class="block text-gray-600 mb-1" for="title">Price</label>
                    <input 
                        type="number" 
                        name="price" 
                        id="price" 
                        placeholder="Masukkan Harga Foto"
                        required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                </div>

                <div>
                    <label class="block text-gray-600 mb-1" for="image">Pilih Gambar</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="image" 
                        required
                        class="w-full px-4 py-2 border rounded-lg bg-gray-50 file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0 file:text-sm file:font-semibold
                            file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                    >
                </div>

                <div class="text-center">
                    <button 
                        type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200"
                    >
                        Upload
                    </button>
                </div>
            </form>
        </div>

    </main>
</body>
</html>

