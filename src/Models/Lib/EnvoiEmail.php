<?php

namespace App\Models\Lib;



use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class EnvoiEmail
{
    private string $dns;

    public function __construct()
    {
        $this->dns = "gmail+smtp://quentin.sae.eshop@gmail.com:tbrkzkkreaomcewk@default"; // google application password
    }

    public function sendMail($email, $content){

        $transport = Transport::fromDsn($this->dns);
        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from('quentin.sae.eshop@gmail.com') // 7gbyq63cZ72asw34
            ->to($email)
            ->priority(Email::PRIORITY_HIGHEST)
            ->subject('Code de vérification')
            ->text('')
            ->html($content);

        $mailer->send($email);
    }
}