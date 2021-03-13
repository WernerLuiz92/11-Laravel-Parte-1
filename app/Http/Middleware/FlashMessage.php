<?php

namespace App\Http\Middleware;

trait FlashMessage
{
    /**
     * Envia os dados para uma Flash Message.
     *
     * @param string -> $type          Tipo da mensagem, aplica classes bootstrap.
     *                                 primary | secondary | success | danger | warning | info | light | dark
     * @param string -> $message       Texto da mensagem
     * @param bool   -> $autoClose     Define se a mensagem fechará automaticamente após 3s
     * @param string -> $strongMessage Início da mensagem em negrito
     *                                 opcional
     * @param string -> $position      Define a localização onde a mensagem deve ser exibida
     *                                 Padrão -> 'header'
     *                                 Opção -> 'login'
     */
    public static function setFlashMessage(string $type, string $message, string $strongMessage = '')
    {
        session([
            'strong_message' => $strongMessage,
            'message' => $message,
            'type' => $type,
        ]);
    }

    public static function unsetFlashMessage()
    {
        session()->forget([
            'strong_message',
            'message',
            'type',
        ]);
    }
}
