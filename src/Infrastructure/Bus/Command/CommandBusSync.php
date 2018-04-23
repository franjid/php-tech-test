<?php

declare (strict_types = 1);

namespace App\Infrastructure\Bus\Command;

use App\Domain\Bus\Command\Command;
use App\Domain\Bus\Command\CommandBus;
use Prooph\ServiceBus\CommandBus as ProophCommandBus;
use Prooph\ServiceBus\Plugin\Router\CommandRouter;

final class CommandBusSync implements CommandBus
{
    private $bus;
    private $router;

    public function __construct()
    {
        $this->bus = new ProophCommandBus();
        $this->router = new CommandRouter();
    }

    public function register($commandClass, callable $handler): void
    {
        $this->router->route($commandClass)->to($handler);
        $this->router->attachToMessageBus($this->bus);
    }

    public function dispatch(Command $command) : void
    {
        $this->bus->dispatch($command);
    }
}
