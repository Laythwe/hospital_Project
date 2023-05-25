<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drug List</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black h-screen text-white ">

<div class="relative overflow-x-auto m-14">
    <h1 class="my-8 text-lg">
        @lang("message.druglist")
    </h1>

    <p class="mx-1">
        {{ trans_choice('message.drug',  $drugcount ) }}
        </p>
   
    <a href="/drug/create"><button class="text-white float-right bg-blue-600 
        p-2 rounded-lg mb-3">
    @lang("message.adddrug")
    </button>
</a>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @lang("message.drugname")
                </th>
                <th scope="col" class="px-6 py-3">
                    @lang("message.drugweight")
                </th>
                <th scope="col" class="px-6 py-3">
                    @lang("message.drugstock")
                </th>
                <th scope="col" class="px-6 py-3">
                    @lang("message.drugprice")
                </th>
                <th scope="col" class="px-6 py-3 text-center" colspan="2">
                    @lang("message.action")
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drugs as $drugblade)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="/drug/{{ $drugblade->id }}"
                        class="underline text-blue-400 ">{{ $drugblade->d_name }}</a>
                </th>
                <td class="px-6 py-4">
                    {{ $drugblade->d_weight }}
                </td>
                <td class="px-6 py-4">
                    {{ $drugblade->d_stock }}
                </td>
                </td>
                <td class="px-6 py-4">
                    {{ $drugblade->d_price }} /perItem
                </td>
                <td class="px-6 py-4">
                    <a href="/drug/{{ $drugblade->id }}/edit" class="text-green-400 underline"> 
                    @lang("message.edit")
                    </a>
                </td>
                <td class="px-6 py-4">
                    <form action="/drug/{{ $drugblade->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 underline">
                            @lang("message.delete")
                        </button>
                    </form>

                </td>
            </tr>
            @empty
                
            @endforelse
            
        </tbody>
    </table>
    <br>
    {{ $drugs->links() }}
</div>
<a href="/home" class="text-yellow-600 mx-14"><-@lang('message.backhome')</a>
</body>
</html>