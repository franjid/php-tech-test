<?php

declare(strict_types = 1);

namespace App\Application\Command;

use App\Application\SavingsAddAmount;

final class AddAmountToSavingsCommandHandler
{
    private $savings;

    public function __construct(SavingsAddAmount $savings)
    {
        $this->savings = $savings;
    }

    public function __invoke(AddAmountToSavingsCommand $command): void
    {
        // @todo create value object for amount
        //$amount = new Amount($command->amount());
        $amount = $command->amount();

        $this->savings->add($amount);
    }
}
