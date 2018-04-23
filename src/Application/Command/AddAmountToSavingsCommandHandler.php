<?php

declare(strict_types = 1);

namespace App\Application\Command;


final class AddAmountToSavingsCommandHandler
{
    public function __construct()
    {
    }

    public function __invoke(AddAmountToSavingsCommand $command): void
    {
        echo 'Add to savings: ' . $command->amount();
    }
}
