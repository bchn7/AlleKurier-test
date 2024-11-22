<?php

namespace App\Core\User\Domain\Event;

use App\Common\Mailer\MailerInterface;
use App\Core\User\Domain\User;

class UserCreatedEvent extends AbstractUserEvent
{
    public const NAME = 'user.created';
    private MailerInterface $mailer;

    public function __construct(User $user, MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        parent::__construct($user);
    }

    public function sendEmail(): string
    {
        $email =  $this->user->getEmail();
        $this->mailer->send($email,'Konto stworzone', 'Zarejestrowano konto w systemie. Aktywacja konta trwa do 24h');
        echo "Email wysłany do: {$email}\n";
        echo "Temat: 'Konto Stworzone'\n";
        echo "Wiadomość: 'Zarejestrowano konto w systemie. Aktywacja konta trwa do 24h'\n";
        return '';
    }
}
