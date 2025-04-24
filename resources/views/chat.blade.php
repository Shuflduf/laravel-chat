<html>
    <head>
            @vite('resources/css/app.css')
    </head>
    <body>
        <x-main-layout>
            @foreach ($messages as $message)
                <p>{{ $message->content }}</p>
            @endforeach
        </x-main-layout>
    </body>
</html>
