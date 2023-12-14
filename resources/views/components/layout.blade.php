<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>{{$title ?? "Application Laravel"}}</title>
</head>
<body>
<menu>
    <x-header></x-header>
</menu>
<main>
    {{$slot}}
</main>
<aside>
    Explications
</aside>
<footer>
    <x-footer></x-footer>
</footer>
</body>
</html>
