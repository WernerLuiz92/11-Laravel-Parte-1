<?php

namespace App\Http\Controllers;

use App\Http\Middleware\FlashMessage;

class Home extends Controller
{
    public function index()
    {
        FlashMessage::setFlashMessage('info', 'Olá!! Seja muito bem-vindo(a)!');

        return view('home');
    }
}
