<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unread Message</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black h-screen text-white ">

<div class="relative overflow-x-auto m-14">
    <h1 class="my-8 text-lg">
       @lang("message.unreadmessage") 
    </h1>

    <p class="mx-1 my-5">
        {{ trans_choice('message.unread',  $messagecount ) }}
        </p>
        <a href="/message/create"><button class="text-white float-right bg-blue-600 p-2 rounded-lg mr-5 mb-5">
            @lang("message.adddoc")
            </button></a>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   @lang("message.Message")
                </th>
                <th scope="col" class="px-6 py-3">
                    @lang("message.time")
                </th>
                <th scope="col" class="px-6 py-3 text-center" colspan="2">
                    @lang("message.action")
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mess as $messblade)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                    <a href="/message/{{ $messblade->id }}"
                        class="underline text-blue-400 ">{{ $messblade->m_message }}</a>
                    <p>
                        @if ($messblade->m_option == 1)
                            VIP message
                        @else
                        @endif
                    </p>
                </th>
                <td class="px-6 py-4">
                    {{ $messblade->m_time }}
                </td> 
                <td class="px-6 py-4">
                    <form action="/message/{{ $messblade->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
    <br>
    {{ $mess->links() }}
</div>
<a href="/home" class="text-yellow-600 mx-14"><-Back to Home</a>
</body>
</html>