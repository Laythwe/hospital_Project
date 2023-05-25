<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unread Message Info</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white">
    <div class="relative overflow-x-auto mx-14">
        <a href="/message" class=" text-white my-5  text-lg">
        @lang("message.unreadmessage")
        </a>
        <p class="my-3"> @lang("message.Message"): <span> {{ $messinfo->m_message }}</span>
            <p>
                @if ($messinfo->m_option == 1)
                    VIP message
                @else
                @endif
            </p>
        </p>
        <p class="my-3"> @lang("message.time"): <span> {{ $messinfo->m_time }}</span></p>

    </div>
</body>

</html>
