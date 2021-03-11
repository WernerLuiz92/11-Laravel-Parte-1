<?php

namespace App\Http\Middleware;

class DebugWerner
{
    public static function varDump($var, bool $exit = true)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        if ($exit === true) {
            exit();
        }
    }

    public static function dd($var, bool $exit = true)
    {
        dd($var);
        if ($exit === true) {
            exit();
        }
    }
}
