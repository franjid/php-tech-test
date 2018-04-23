<?php

declare(strict_types = 1);

namespace App\Domain;

use App\Domain\Bus\Event\Event;

interface Projection
{
    public function execute(Event $event) : void;
}
