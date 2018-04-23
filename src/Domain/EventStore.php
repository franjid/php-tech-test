<?php

namespace App\Domain;

use App\Domain\Bus\Event\Event;

interface EventStore
{
    public function save(Event $event) : void;
}
