<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
           @vite('resources/css/app.css')
           <style>
            *{
                font-family: 'Georgia', 'Times New Roman', Times, serif;
            }
           </style>

</head>
<body style="background-image: url('{{ asset('assets/image/bgphoto2.jpg')}}'); background-size: cover;" >
   {{-- Error alert popup --}}
    @if ($errors->any())
        <script>
            alert(`{{ implode('\n', $errors->all()) }}`);
        </script>
    @endif
    
    <div class="container w-full max-w-md h-[80vh] bg-gray-100 flex items-start justify-center mx-auto mt-20  rounded-2xl  shadow-lg shadow-cyan-500/50">
        
        <div class="list relative p-4">
            <div class="flex w-fit rounded-full border border-gray-300 overflow-hidden shadow-md mt-10 mb-15 ml-[6vh]">
            <!-- Tombol Login dengan gradient -->
                <button class="px-13 py-3 text-black font-semibold bg-white cursor-pointer">
                   <a href="/login"> Login</a>
                </button>
                
                <!-- Tombol Registrasi -->
                <button class="px-13 py-3 text-white font-semibold bg-gradient-to-r from-black to-white cursor-pointer">
                    <a href="/register">Registrasi</a>
                </button>
            </div >
            
            <form action="{{ route('registercheck') }}" method="POST">
                @csrf
                <input type="text" name="name" class="border rounded-xl  w-[45vh] h-[50px] p-2 shadow-xl/20 ml-[7vh] " placeholder="Masukan Nama" required>
                <input type="email" name="email" class="border rounded-xl  w-[45vh] h-[50px] p-2 shadow-xl/20 ml-[7vh] mt-7" placeholder="Masukan Email" required>
                <input type="number" name="telpon" class="border rounded-xl  w-[45vh] h-[50px] p-2 shadow-xl/20 ml-[7vh] mt-7" placeholder="Masukan No.Telp" required>
                <div class="relative w-[45vh] ml-[7vh] mt-7">
                    <input type="password" id="password" name="password"
                        class="border rounded-xl w-full h-[50px] p-2 pr-10 shadow-xl/20"
                        placeholder="Masukan Password" required>
                    
                    <!-- Ikon mata -->
                    <span onclick="togglePassword()"
                        class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer text-gray-500">
                        👁️
                    </span>
                </div>
                <input type="submit" name="daftar" value="Daftar" class="border rounded-xl w-[45vh] h-[50px] p-2 shadow-xl/20 mt-7 ml-[7vh] cursor-pointer bg-black text-white  hover:bg-white hover:text-black">    
            </form>
            
        </div>
    </div>
    
    <script>
        function togglePassword(){
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>