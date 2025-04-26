<?php

namespace App\View\Components;

use App\Http\Controllers\GetConversations;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainLayout extends Component
{
    private $conversations;

    public function __construct()
    {
        $controller = new GetConversations();
        $this->conversations = $controller->getConversations()->getData();
    }

    public function render(): View|Closure|string
    {
        return view('components.main-layout', [
            'conversations' => $this->conversations
        ]);
    }
}
