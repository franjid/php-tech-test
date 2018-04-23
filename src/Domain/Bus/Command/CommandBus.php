<?php

declare (strict_types = 1);

namespace App\Domain\Bus\Command;

interface CommandBus
{
    public function register($commandClass, callable $handler) : void;

    public function dispatch(Command $command) : void;
}
