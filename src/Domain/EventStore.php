<?php

declare(strict_types = 1);

namespace App\Domain;

use App\Domain\Bus\Event\Event;

interface EventStore
{
    public function save(Event $event) : void;
}
