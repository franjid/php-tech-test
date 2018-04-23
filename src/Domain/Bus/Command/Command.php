<?php

declare (strict_types = 1);

namespace App\Domain\Bus\Command;

use App\Domain\Bus\Request;
use App\Types\ValueObject\Uuid;

class Command extends Request
{
    public function commandId(): Uuid
    {
        return $this->requestId();
    }

    public function messageType(): string
    {
        return 'command';
    }
}
