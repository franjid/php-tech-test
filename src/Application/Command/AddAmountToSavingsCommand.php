<?php

declare(strict_types = 1);

namespace App\Application\Command;

use App\Domain\Bus\Command\Command;
use App\Types\ValueObject\Amount;
use App\Types\ValueObject\Uuid;

final class AddAmountToSavingsCommand extends Command
{
    private $amount;

    public function __construct(Amount $amount)
    {
        parent::__construct(Uuid::random());

        $this->amount = $amount->value();
    }

    public function amount(): float
    {
        return $this->amount;
    }
}
