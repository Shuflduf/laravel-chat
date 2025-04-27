<html>
    <head>
            @vite('resources/css/app.css')
    </head>
    <body>
        <x-main-layout :user="$user">
            <x-conversation-area :name="$name" />
        </x-main-layout>
    </body>
</html>
