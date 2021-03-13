<?php

namespace App\View\Components;

use App\Http\Middleware\FlashMessage;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (session('message') !== null) {
            $type = session('type');
            $strongMessage = session('strong_message');
            $message = session('message');
            FlashMessage::unsetFlashMessage();

            return view('components.alert', compact('type', 'strongMessage', 'message'));
        }
    }
}
