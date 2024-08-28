 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>SPP lOGIN</title>
     @vite('resources/css/app.css')
     @vite('resources/js/app.js')
     <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 </head>

 <body class="font-inter h-full w-full">

     <div
         class="h-dvh w-full items-center justify-center bg-[url('https://i.ytimg.com/vi/is-6lNoy9zM/maxresdefault.jpg')] bg-cover">
         <div class="absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 items-center justify-center">
             <div class="top-auto w-96 rounded-lg bg-white px-2 py-3 shadow-lg">
                 <div class="mb-8">
                     <h1 class="from text-center text-3xl font-bold">Login</h1>
                 </div>
                 <div class="mb-8 flex justify-center">
                     <form action="{{ route('login') }}" method="POST">
                         @csrf
                         <div class="relative mb-7">
                             <input type="text" name="username" id="username" required
                                 class="peer w-full border-0 border-b-2 border-slate-500 bg-transparent px-0.5 placeholder:text-transparent focus:outline-none focus:ring-0"
                                 placeholder="username" autofocus value="{{ old('username') }}">
                             <label for="username"
                                 class="absolute -top-4 left-0 select-none text-xs text-gray-500 transition-all peer-placeholder-shown:left-0 peer-placeholder-shown:top-2 peer-placeholder-shown:text-sm peer-focus:-top-4 peer-focus:left-0 peer-focus:text-xs">Username</label>
                             @error('username')
                                 <p class="text-red-600"> {{ $message }}</p>
                             @enderror
                         </div>
                         <div class="relative mb-4">
                             <input type="password" required name="password" id="password"
                                 class="peer w-full border-0 border-b-2 border-slate-500 bg-transparent px-0.5 placeholder:text-transparent focus:outline-none focus:ring-0"
                                 placeholder="name">
                             <label for="password"
                                 class="absolute -top-4 left-0 select-none text-xs text-gray-500 transition-all peer-placeholder-shown:left-0 peer-placeholder-shown:top-2 peer-placeholder-shown:text-sm peer-focus:-top-4 peer-focus:left-0 peer-focus:text-xs">
                                 password</label>
                             @error('password')
                                 <p class="text-red-600"> {{ $message }}</p>
                             @enderror
                         </div>

                         <div class="mb-8 flex justify-center">
                             <input type="submit" value="Login"
                                 class="mt-10 rounded-lg bg-slate-700 px-4 py-2 font-bold text-white hover:cursor-pointer hover:ring-1 hover:ring-sky-800">
                         </div>

                     </form>
                 </div>

                 <div class="mb-4">
                     <p class="text-center">Dont have account? <a class="text-sky-500 hover:underline"
                             href="/register">Register Now</a></p>
                 </div>
             </div>

         </div>
     </div>
 </body>

 </html>

