<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoctorList</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white"> 
    {{-- <a href="/lang/mm" class="text-yellow-600 mx-5 my-5 float-right underline">Myanmar</a>
        <a href="/lang/en" class="text-yellow-600 my-5 float-right underline">English</a> --}}
    <div class="relative overflow-x-auto">
        <h1 class="my-8 text-lg mx-14">@lang("message.doctorlist")</h1>
        
        <p class="mx-14">
        {{ trans_choice('message.doclist',  $doclistcount) }}
        </p>
                <a href="/doctorlist/create"><button class="text-white float-right bg-blue-600 p-2 rounded-lg mr-5 mb-5">
                    @lang("message.adddoc")
                    </button></a>
            
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.docname")
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.docage")
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.docphone")
                    </th> 
                    <th scope="col" class="px-6 py-3">
                        @lang("message.docspecial")
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.docexp")
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang("message.docmedli")
                    </th> 
                    <th scope="col" class="px-6 py-3 text-center" colspan="2">
                       @lang("message.action")
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($docs as $docblade)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="/doctorlist/{{ $docblade->id }}"
                                class="underline text-blue-400 ">Dr.{{ $docblade->name }}</a>
                        </th>
                        <td class="px-6 py-4">
                            {{ $docblade->age }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $docblade->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $docblade->field->special }} 
                        </td>
                        <td class="px-6 py-4"> 
                            {{ $docblade->field->experience }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $docblade->field->medli }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="/doctorlist/{{ $docblade->id }}/edit" class="text-green-400 underline"> @lang("message.edit")</a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/doctorlist/{{ $docblade->id }}" method="POST">
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
        {{ $docs->links() }}
    </div>
    <a href="/home" class="text-yellow-600 mx-14"><-{{__("message.backhome") }}</a>
</body>

</html>
