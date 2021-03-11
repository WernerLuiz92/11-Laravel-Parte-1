<?php

namespace App\Http\Middleware;

class FlashMessage
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
    public static function setFlashMessage(string $type, string $message, bool $autoClose = false, string $strongMessage = '', string $position = 'header')
    {
        $_SESSION['position'] = $position;
        $_SESSION['strong_message'] = $strongMessage;
        $_SESSION['message'] = $message;
        if ($autoClose === true) {
            $_SESSION['message_type'] = $type.' auto-close';

            return;
        }
        $_SESSION['message_type'] = $type;
    }

    /**
     *  Remove a flash Message.
     */
    public static function unsetFlashMessage()
    {
        unset($_SESSION['position']);
        unset($_SESSION['strong_message']);
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
}
