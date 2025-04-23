<html>
    <body>
        <x-conversations-sidebar />
        @foreach ($messages as $message)
            {{ $message->content }}<br>
        @endforeach
    </body>
</html>
