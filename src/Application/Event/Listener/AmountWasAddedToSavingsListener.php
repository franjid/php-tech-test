<?php

namespace App\Application\Event\Listener;

use App\Application\Event\AmountWasAddedToSavingsEvent;
use App\Domain\EventStore;

final class AmountWasAddedToSavingsListener
{
    private $eventStore;

    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }

    public function __invoke(AmountWasAddedToSavingsEvent $event)
    {
        $this->eventStore->save($event);
    }
}
