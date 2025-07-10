<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Photo</title>
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

       <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Image Preview -->
            <div class="flex flex-col items-center justify-center">
                <div class="relative inline-block">
                    <img src="{{ asset('assets/imageProduct/' . $photo->image) }}" alt="Preview" class="rounded-lg shadow w-full max-h-96 object-cover mb-4" oncontextmenu="return false;"  
                        ondragstart="return false;" 
                        onmousedown="return false;" 
                        style="pointer-events: none; user-select: none;">
                    {{-- watermark --}}
                    <img src="{{ asset('assets/imageProduct/povshot.png')}}" 
                        alt="watermark" 
                        class="absolute bottom-6 left-1/2 transform -translate-x-1/2 w-10 opacity-50 pointer-events-none select-none">
                </div>
                <p class="text-sm text-gray-500 italic">Foto saat ini</p>
            </div>

            <!-- Edit Form -->
            <form action="{{ route('updatePhoto', $photo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <h2 class="text-2xl font-bold text-center mb-4 text-gray-800">Edit Foto</h2>

            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" value="{{ $photo->title }}" required class="mt-1 w-full border rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan judul foto">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" name="description" value="{{ $photo->description }}" required class="mt-1 w-full border rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500"  placeholder="Masukkan Deskripsi Foto">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" value="{{ $photo->price }}" required class="mt-1 w-full border rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500"  placeholder="Masukkan Harga Foto">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Pilih Gambar Baru (Opsional)</label>
                <input type="file" name="image" class="mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition duration-200 cursor-pointer">
                    Update
                </button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>

