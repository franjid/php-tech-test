<?php

declare (strict_types = 1);

namespace App\Domain\Bus;

use App\Types\ValueObject\Uuid;

abstract class Request extends Message
{
    public function requestId(): Uuid
    {
        return $this->messageId();
    }
}
