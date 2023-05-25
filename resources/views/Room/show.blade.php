<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room Info</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white">
    <div class="relative overflow-x-auto mx-14">
        <a href="/room" class=" text-white my-5  text-lg">@lang("message.roomlist")</a>

        <p class="my-3"> @lang("message.roomnumber") <span> {{ $roominfo->r_number }}:</span></p>
        <p class="my-3"> @lang("message.roomstatus"):
            <span>  
                @if ($roominfo->r_status == 0)
                    Available
                @elseif ($roominfo->r_status == 1)
                    Active
                @elseif ($roominfo->r_status == 2)
                    Lock
                @endif
            </span>
        </p>
        <p class="my-3"> @lang("message.pax"):
            <span>
                @if ($roominfo->r_left == 0)
                    None
                @else
                    {{ $roominfo->r_left }}
                @endif

            </span>
        </p>
        <p class="my-3">  @lang("message.roomcharge"):
             <span> {{ $roominfo->r_charge }}:</span></p>

    </div>
</body>

</html>
