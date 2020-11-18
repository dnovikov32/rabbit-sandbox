<?php

declare(strict_types=1);

namespace App\Bus;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class EventMessageHandler implements MessageHandlerInterface
{
    public function __invoke(EventMessage $eventMessage)
    {
        file_put_contents(__DIR__.'./../../var/test.txt', sprintf("Message: %d\n", $eventMessage->getId()), FILE_APPEND);
    }
}