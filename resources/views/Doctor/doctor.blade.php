<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment List</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white ">
    <div class="relative overflow-x-auto m-14">
        <h1 class="my-8 text-lg">@lang("message.appointlist")</h1>
        

            <p class="mx-1">
                {{ trans_choice('message.doctor',  $doctorcount ) }}
                </p>

        <a href="/doctor/create"><button class="text-white float-right bg-blue-600 
        p-2 rounded-lg mb-3">
                @lang("message.addappoint")
                </button>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            @lang("message.doctorname")
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @lang("message.roomnumber")
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @lang("message.datetime")
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" colspan="2">
                            @lang("message.action")
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctors as $docblade)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/doctor/{{ $docblade->id }}" class="underline text-blue-400 "> Meet
                                    Dr.{{ $docblade->doc_name }}</a>
                            </th>
                            <td class="px-6 py-4">
                                {{ $docblade->doc_room }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $docblade->app_time }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="/doctor/{{ $docblade->id }}/edit" class="text-green-400 underline"> @lang("message.edit")</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/doctor/{{ $docblade->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 underline">@lang("message.delete")</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <br>
            {{ $doctors->links() }}
    </div>
    <a href="/home" class="text-yellow-600 mx-14"><-Back to Home</a>
</body>

</html>
