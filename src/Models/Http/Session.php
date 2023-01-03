<?php

namespace App\Models\Http;

use App\Config\Conf;
use App\Models\Lib\MessageFlash;
use App\Models\Lib\Panier;
use Exception;

class Session
{
    private static ?Session $instance = null;

    /**
     * @throws Exception
     */
    private function __construct()
    {
        session_set_cookie_params(Conf::getDureeExpiration());
        if (session_start() === false) {
            throw new Exception("La session n'a pas réussi à démarrer.");
        }
        MessageFlash::create();
        Panier::create();
    }

    public static function getInstance(): Session
    {
        if (is_null(static::$instance))
        {
            static::$instance = new Session();
            self::verifierDerniereActivite();
            time_nanosleep(0, 500);
        }
        return static::$instance;
    }

    private static function verifierDerniereActivite(): void
    {
        if (isset($_SESSION['derniereActivite']) && (time() - $_SESSION['derniereActivite'] > (Conf::getDureeExpiration()))) {
            session_unset();
        }
        $_SESSION['derniereActivite'] = time();
    }

    public function contient($name): bool
    {
        return isset($_SESSION[$name]);
    }

    public function enregistrer(string $name, mixed $value): void
    {
        $_SESSION[$name] = $value;
    }


    public function lire(string $name): mixed
    {
        if($this->contient($name)) return $_SESSION[$name];
        return null;
    }

    public function supprimer($name): void
    {
        unset($_SESSION[$name]);
    }

    public function detruire() : void
    {
        session_unset();     // unset $_SESSION variable for the run-time*

        if (session_status() === PHP_SESSION_ACTIVE)
            session_destroy();

       // session_destroy();   // destroy session data in storage
      //  var_dump(session_name());
        Cookie::supprimer(session_name()); // deletes the session cookie
        // Il faudra reconstruire la session au prochain appel de getInstance()
        $instance = null;
    }
}

