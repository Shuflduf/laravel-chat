@props(['user', 'conversations'])

<div class="flex h-screen w-full bg-slate-300 overflow-hidden">
    <div class="flex flex-col gap-4 w-60 p-4 pr-0 h-full">
        <div class="bg-slate-500 rounded-lg">
            <p class="text-xl font-bold text-white m-2 text-center">{{ $user->name }}</p>
        </div>
        <div class="flex flex-col bg-slate-500 h-full rounded-lg">
            @foreach ($conversations as $convo)
                <a href="/chat/{{ $convo->name }}" class="text-white hover:bg-slate-700 p-2 rounded-lg">
                    {{ $convo->name }}
                </a><br>
            @endforeach
        </div>
    </div>
    <div class="p-4 w-full h-full overflow-hidden">
        {{ $slot }}
    </div>
</div>

