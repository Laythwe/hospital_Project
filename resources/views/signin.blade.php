<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Signin Form</title>
 @vite('resources/css/app.css')
</head>
<body class= "bg-black h-screen text-white">  

 
     <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
         <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-blue-800 dark:border-gray-700">
             <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                 <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                     Create new account
                 </h1>
                 <form class="space-y-4 md:space-y-6" action="/signin" method="post">
                     @csrf
                     <div>
                         <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                         <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-orange-200 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('username') }}" required="" >
                         @error("username")
                         <li class="text-red-500">{{ $message }}</li>
                         @enderror
                     </div>                    
                     <div>
                         <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                         <input type="password" name="password" id="password"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-orange-200 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('password') }}" required="" >
                         @error("password")
                         <li class="text-red-500">{{ $message }}</li>
                         @enderror
                     </div>
                     <div>
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                        <input type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-orange-200 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('age') }}" required="" >
                        @error("age")
                        <li class="text-red-500">{{ $message }}</li>
                        @enderror
                    </div>  
                     <div class="flex flex-col items-center">
                     <button type="submit" name="signin" class=" w-40 text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button></div>
                 </form>
             </div>
         </div>
     </div>
   

 
</body>
</html>