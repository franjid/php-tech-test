<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Event;

use App\Domain\Bus\Event\Event;
use App\Domain\Bus\Event\EventPublisher as EventPublisherInterface;
use Prooph\ServiceBus\EventBus;
use Prooph\ServiceBus\Plugin\Router\EventRouter;

final class EventPublisher implements EventPublisherInterface
{
    private $bus;
    private $router;

    public function __construct()
    {
        $this->bus = new EventBus();
        $this->router = new EventRouter();
    }

    public function subscribe(string $eventClass, callable $subscriber): void
    {
        $this->router->route($eventClass)->to($subscriber);
        $this->router->attachToMessageBus($this->bus);
    }

    public function publish(Event $event) : void
    {
        $this->bus->dispatch($event);
    }
}
