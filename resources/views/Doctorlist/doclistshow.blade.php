<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctorlist Info</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white">
    <div class="relative overflow-x-auto mx-14">
        <a href="/doctorlist" class=" text-white my-5  text-lg underline">@lang("message.doctorlist")</a>

        <p class="my-3"> @lang("message.docname"): <span> {{ $doctorlistinfo->name }}:</span></p>
        <p class="my-3"> @lang("message.docage"): <span> {{ $doctorlistinfo->age }}:</span></p>
         <p class="my-3">  @lang("message.docphone"): <span> {{ $doctorlistinfo->phone }}:</span></p>

    </div>
</body>

</html>
