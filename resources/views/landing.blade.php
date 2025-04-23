<html>
    <body>
        <h1>Select a Conversation to get started</h1>
        @foreach ($conversations as $conversation)
            <a href="/chat/{{ $conversation->name }}">
                {{ $conversation->name }}
            </a><br>
        @endforeach

    </body>
</html>
