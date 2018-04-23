<?php

namespace App\Application\Event;

use App\Domain\Bus\Event\Event;

final class AmountWasAddedToSavingsEvent extends Event
{
    public static function eventName(): string
    {
        return 'amount_added_to_savings';
    }
}
