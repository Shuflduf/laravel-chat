<div class="flex min-h-screen w-full bg-slate-300">
    <div class="flex flex-col gap-4 w-60 m-4 mr-0 sticky h-[calc(100vh-2rem)]">
        <div class="bg-slate-500 rounded-lg">
            <p class="text-xl font-bold text-white m-2 text-center">@Shuflduf</p>
        </div>
        <div class="flex flex-col bg-slate-500 h-full rounded-lg">
            @foreach ($conversations as $convo)
                <a href="/chat/{{ $convo->name }}" class="text-white hover:bg-slate-700 p-2 rounded-lg">
                    {{ $convo->name }}
                </a><br>
            @endforeach
        </div>
    </div>
    <div class="m-4 w-full">
        {{ $slot }}
    </div>
</div>

