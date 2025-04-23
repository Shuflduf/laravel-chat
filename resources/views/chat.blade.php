<html>
    <body>
        @foreach ($messages as $message)
            {{ $message->content }}<br>
        @endforeach
    </body>
</html>
