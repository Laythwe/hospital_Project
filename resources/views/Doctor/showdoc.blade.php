<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Info</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white">
    <div class="relative overflow-x-auto mx-14">
        <a href="/doctor" class=" text-white my-5 text-lg underline"><-@lang("message.appointlist")</a>

        <p class="my-3"> @lang("message.doctorname"): <span> {{ $doctorinfo->doc_name }}</span></p>
        <p class="my-3"> @lang("message.roomnumber"): <span> {{ $doctorinfo->doc_room }}</span></p>
        <p class="my-3"> @lang("message.datetime"): <span> {{ $doctorinfo->app_time }}</span></p>
    </div>
</body>
</html>
