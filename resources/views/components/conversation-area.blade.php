<div class="relative h-full p-4 pt-0 w-full">
    <div class="overflow-y-auto pb-16">
        <h1 class="text-2xl font-bold mb-4">Chat with ME</h1>
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
    <div class="absolute bottom-0 left-0 right-0 w-full">
        <input type="text" class="border rounded-lg p-4 w-full bg-slate-500 text-white" placeholder="Message {{ $name }}" />
    </div>
</div>
