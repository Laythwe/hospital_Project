<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drug Info</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black h-screen text-white">
    <div class="relative overflow-x-auto mx-14">
        <a href="/drug" class=" text-white my-5 text-lg ">
        @lang("message.druglist")
        </a>
        <p class="my-3"> @lang("message.drugname"): <span> {{ $druginfo->d_name }}</span></p>
        <p class="my-3"> @lang("message.drugweight"): <span> {{ $druginfo->d_weight }}</span></p>
        <p class="my-3"> @lang("message.drugstock"): <span> {{ $druginfo->d_stock }}</span></p>
        <p class="my-3"> @lang("message.drugprice"): <span> {{ $druginfo->d_price }}</span></p>
    </div>
</body>

</html>
