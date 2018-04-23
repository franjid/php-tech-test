<?php

declare(strict_types = 1);

namespace App\Application\Command;

use App\Application\SavingsAddAmount;
use App\Types\ValueObject\Amount;

final class AddAmountToSavingsCommandHandler
{
    private $savings;

    public function __construct(SavingsAddAmount $savings)
    {
        $this->savings = $savings;
    }

    public function __invoke(AddAmountToSavingsCommand $command): void
    {
        $amount = new Amount($command->amount());

        $this->savings->add($amount);
    }
}
