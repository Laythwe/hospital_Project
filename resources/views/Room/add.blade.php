<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Room</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white">
    <div class="relative overflow-x-auto mx-14 my-10">
        <p class="text-lg font-semibold mb-5">{{ __("message.new") }}</p>

        <form action="/room" method="POST">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="r_number" id="r_number" required
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="r_number"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                   @lang("message.roomnumber") </label>
            </div>

            <div class="relative z-0 w-full mb-6 group"> @lang("message.roomstatus")
                <input type="radio" name="r_status" id="available" value="Available" class="ml-5" required checked>
                <label for="available">Available</label>
                <input type="radio" name="r_status" id="active" value="Active" class="ml-5" required >
                <label for="active">Active</label>
                <input type="radio" name="r_status" id="lock" value="Lock" class="ml-5" >
                <label for="lock">Lock</label>
            </div>
            
            <div class="relative z-0 w-full mb-6 group">
                <input type="number" name="r_left" id="r_left"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label
                    for="r_left"class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    @lang("message.pax")
                </label>
            </div>

            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="r_charge" id="r_charge"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="r_charge"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                @lang("message.roomcharge")
                </label>
            </div>
            <button type="add"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@lang("message.btnadd")</button>
        </form>

    </div>

</body>

</html>
