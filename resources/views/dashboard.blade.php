<div class="grid grid-cols-2 gap-4 my-10 mx-4" class="p-4 sm:ml-64">
    <div class="relative overflow-x-auto">
        <table class="w-3/4 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3 bg-yellow-400 text-white " colspan="4">
                        @lang("message.homestatus")
                    </th> 
                </tr>
            </thead>
            <tbody >
                @forelse ($rooms as $getroom )
                <tr class="bg-white border-b  text-black dark:border-gray-700">
                    <th scope="row"
                        class="px-2 py-4 font-medium whitespace-nowrap  ">
                        {{ $getroom ->r_number}}
                    </th>
                    <td class="px-2 py-4">
                        {{ $getroom ->r_status}}
                    </td>
                    <td class="px-2 py-4">
                        {{ $getroom ->r_left}}
                    </td>
                    <td class="px-2 py-4">
                        {{ $getroom ->r_charge}}
                    </td>
                </tr> 
                @empty
                @endforelse
               
            </tbody>
        </table>
        <div class="flex flex-auto">
        <a href="/room"><button class="bg-yellow-400 text-white w-40 h-10 my-4 rounded-full">
            @lang("message.roomseeall")
        </button></a>
    </div>
    </div>

    <div class="relative overflow-x-auto  ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-500 text-white" colspan="2">
                        @lang('message.unreadmessage')
                    </th> 
                </tr>
            </thead>
            <tbody>
                @forelse ( $messages as $getmessage )
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $getmessage ->m_message  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $getmessage ->m_time  }}
                    </td> 
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        <a href="/message"><button class="bg-gray-400 text-white w-40 h-10 my-4 rounded-full">
            @lang('message.messagereadmore')
            </button></a>
    </div>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-white bg-green-500" colspan="4">
                       @lang('message.drugstore')
                    </th> 
                </tr>
            </thead>
            <tbody>
                @forelse ( $drugs as $getdrug )
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $getdrug->d_name  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $getdrug->d_weight  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $getdrug->d_stock  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $getdrug->d_price  }}
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        <a href="/drug"><button class="bg-green-400 text-white w-40 h-10 my-4 rounded-full">
            @lang('message.drugcheckall')
            </button></a>
    </div>


    <div class="relative overflow-x-auto">       
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-black-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 bg-red-400 text-black py-3" colspan="3">
                        @lang('message.appointment')
                    </th> 
                </tr>
            </thead>
            <tbody>
                @forelse ( $doctors as $getdoctor )
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $getdoctor ->doc_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $getdoctor ->doc_room }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $getdoctor ->app_time  }}
                    </td> 
                </tr>
                @empty
                @endforelse
            </tbody>            
        </table>
        <a href="/doctor"><button class="bg-red-400 text-black w-40 h-10 my-4 rounded-full">
            @lang('message.appointmentseeall')    
            </button></a>
            <a href="/doctorlist"><button class="bg-blue-400 text-black w-40 h-10 my-4 rounded-full">
                @lang('message.appointmentseeall')    
                </button></a>
    </div>

</div>