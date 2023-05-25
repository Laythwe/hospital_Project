<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RoomList</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white"> 
    {{-- <a href="/lang/mm" class="text-yellow-600 mx-5 my-5 float-right underline">Myanmar</a>
        <a href="/lang/en" class="text-yellow-600 my-5 float-right underline">English</a> --}}
    <div class="relative overflow-x-auto">
        <h1 class="text-white mx-14 my-5 text-2xl">{{ __("message.hello", ["name" => session("username")]) }}</h1>
        <h1 class="my-8 text-lg mx-14">@lang("message.roomlist")</h1>
        
        <p class="mx-14">
        {{ trans_choice('message.room',  $roomcount ) }}
        </p>
                <a href="/room/create"><button class="text-white float-right bg-blue-600 p-2 rounded-lg mr-5 mb-5">
                    @lang("message.addroom")
                    </button></a>
            
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.roomnumber")
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.roomstatus")
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.pax")
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.roomcharge")
                    </th>
                    <th scope="col" class="px-6 py-3 text-center" colspan="2">
                       @lang("message.action")
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rooms as $roomblade)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="/room/{{ $roomblade->id }}"
                                class="underline text-blue-400 ">{{ $roomblade->r_number }}</a>
                        </th>
                        <td class="px-6 py-4">
                            @if ($roomblade->r_status == 0)
                                Available
                            @elseif ($roomblade->r_status == 1)
                                Active
                            @else
                                Lock
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $roomblade->r_left }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $roomblade->r_charge }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="/room/{{ $roomblade->id }}/edit" class="text-green-400 underline"> @lang("message.edit")</a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/room/{{ $roomblade->id }}" method="POST">
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
        {{ $rooms->links() }}
    </div>
    <a href="/home" class="text-yellow-600 mx-14"><-{{__("message.backhome") }}</a>
</body>

</html>
