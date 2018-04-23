<?php

declare(strict_types=1);

namespace App\Domain\Bus\Event;

interface EventPublisher
{
    public function subscribe(string $eventClass, callable $subscriber): void;

    public function publish(Event $event) : void;
}
