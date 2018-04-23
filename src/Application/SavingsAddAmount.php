<?php

declare(strict_types = 1);

namespace App\Application;

use App\Application\Event\AmountWasAddedToSavingsEvent;
use App\Application\Event\EventStoreCsv;
use App\Application\Event\Listener\AmountWasAddedToSavingsListener;
use App\Domain\Bus\Event\EventPublisher;

final class SavingsAddAmount
{
    private $publisher;

    public function __construct(EventPublisher $publisher)
    {
        $this->publisher  = $publisher;
    }

    public function add(string $amount): void
    {
        $event = new AmountWasAddedToSavingsEvent([
                'amount' => $amount
        ]);

        $this->publisher->subscribe(
            AmountWasAddedToSavingsEvent::class,
                new AmountWasAddedToSavingsListener(new EventStoreCsv())
        );
        $this->publisher->publish($event);
    }
}
