<?php

namespace App\Models\Lib;

class MessageFlash
{

    // Les messages sont enregistrés en session associée à la clé suivante
    private static string $cleFlash = "_messagesFlash";

    public static function create() : void
    {
        $_SESSION[self::$cleFlash] = [];
    }

    // $type parmi "success", "info", "warning" ou "danger"
    public static function ajouter(string $type, string $message): void
    {
        if (!isset($_SESSION[self::$cleFlash][$type])) {
            $_SESSION[self::$cleFlash][$type] = [];
        }
        $_SESSION[self::$cleFlash][$type][] = "<p class='alert alert-".$type."'>$message</p>";
    }

    public static function contientMessage(string $type): bool
    {
        return isset($_SESSION[self::$cleFlash][$type]);
    }

    // Attention : la lecture doit détruire le message
    public static function lireMessages(string $type): array
    {
        if (isset($_SESSION[self::$cleFlash][$type])) {
            $messages = $_SESSION[self::$cleFlash][$type];

            unset($_SESSION[self::$cleFlash][$type]);
            return $messages;
        }
        return [];
    }

    public static function lireTousMessages() : array
    {
        $arr = [];
        foreach (["success", "info", "warning", "danger"] as $cle){
            $arr[] = self::lireMessages($cle);
        }
        return $arr;
    }

}

