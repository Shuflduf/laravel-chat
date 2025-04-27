<div class="flex flex-col h-full">
    <h1 class="text-2xl font-bold mb-4">{{ $name }}</h1>
    <div class="flex-1 overflow-y-auto max-h-[calc(100vh-2rem)]">
        @foreach ($messages as $message)
            <div class="mb-4">
                <div class="text-gray-600 font-semibold">
                    {{ $message->user?->name ?? 'Unknown User' }}
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    {{ $message->content }}
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-auto">
        <form method="POST" action="{{ route('messages.store') }}" class="w-full">
            @csrf
            <input type="hidden" name="conversation_id" value="1">
            <input type="text" name="message" class="border rounded-lg p-4 w-full bg-slate-500 text-white" placeholder="Message {{ $name }}" required>
        </form>
    </div>
</div>
