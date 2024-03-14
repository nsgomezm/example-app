<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body >
        <h1>hola mundo </h1>

        <a href="{{ route('alter')  }}">View alter</a>

    </body>
</html>
