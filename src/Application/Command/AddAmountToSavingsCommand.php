<?php

declare(strict_types = 1);

namespace App\Application\Command;

use App\Domain\Bus\Command\Command;
use App\Types\ValueObject\Uuid;

final class AddAmountToSavingsCommand extends Command
{
    private $amount;

    public function __construct(Uuid $messageId, string $amount)
    {
        parent::__construct($messageId);

        $this->amount = $amount;
    }

    public function amount(): string
    {
        return $this->amount;
    }
}
