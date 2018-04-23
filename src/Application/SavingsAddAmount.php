<?php

declare(strict_types = 1);

namespace App\Application;

use App\Application\Event\AmountWasAddedToSavingsEvent;
use App\Application\Event\EventStoreCsv;
use App\Application\Event\Listener\AmountWasAddedToSavingsListener;
use App\Application\Projection\SavingsUpdateTotalAmountProjection;
use App\Domain\Bus\Event\EventPublisher;
use App\Types\ValueObject\Amount;

final class SavingsAddAmount
{
    private $publisher;

    public function __construct(EventPublisher $publisher)
    {
        $this->publisher  = $publisher;
    }

    public function add(Amount $amount): void
    {
        $event = new AmountWasAddedToSavingsEvent([
                'amount' => $amount->value()
        ]);

        $this->publisher->subscribe(
            AmountWasAddedToSavingsEvent::class,
                new AmountWasAddedToSavingsListener(
                    new EventStoreCsv(),
                    new SavingsUpdateTotalAmountProjection()
                )
        );
        $this->publisher->publish($event);
    }
}
