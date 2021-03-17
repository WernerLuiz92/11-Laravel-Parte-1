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
     * @param string -> $autoClose     Define se a mensagem fechará automaticamente após 3s
     *                                 padrão = 'true' | opcional 'false'
     * @param string -> $strongMessage Início da mensagem em negrito
     *                                 opcional
     */
    public static function setFlashMessage(string $type, string $message, string $autoClose = 'true', string $strongMessage = '')
    {
        session([
            'strong_message' => $strongMessage,
            'message' => $message,
            'type' => $type,
            'autoClose' => $autoClose,
        ]);
    }

    public static function unsetFlashMessage()
    {
        session()->forget([
            'strong_message',
            'message',
            'type',
            'autoClose',
        ]);
    }
}
