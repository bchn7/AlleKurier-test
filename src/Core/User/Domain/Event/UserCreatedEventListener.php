<?php

namespace App\Core\User\Domain\Event;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(event: UserCreatedEvent::NAME)]
class UserCreatedEventListener
{
    public function onUserCreated(UserCreatedEvent $event): void
    {
        $event->sendEmail();
    }
}
