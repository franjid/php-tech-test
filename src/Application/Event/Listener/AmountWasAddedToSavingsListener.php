<?php

namespace App\Application\Event\Listener;

use App\Application\Event\AmountWasAddedToSavingsEvent;
use App\Application\Projection\SavingsUpdateTotalAmountProjection;
use App\Domain\EventStore;

final class AmountWasAddedToSavingsListener
{
    private $eventStore;
    private $projection;

    public function __construct(
        EventStore $eventStore,
        SavingsUpdateTotalAmountProjection $projection
    )
    {
        $this->eventStore = $eventStore;
        $this->projection = $projection;
    }

    public function __invoke(AmountWasAddedToSavingsEvent $event)
    {
        $this->eventStore->save($event);
        $this->projection->execute($event);
    }
}
