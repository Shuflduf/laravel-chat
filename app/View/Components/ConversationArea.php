<?php

namespace App\View\Components;

use App\Http\Controllers\ChatController;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConversationArea extends Component
{
    /**
     * Create a new component instance.
     */

    private $messages;

    public function __construct(
        public string $name,
    )
    {
        //
        $controller = new ChatController();
        $this->messages = $controller->getMessages($name)->getData();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.conversation-area', [
            'messages' => $this->messages,
        ]);
    }
}
