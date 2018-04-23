<?php

namespace App\Infrastructure\Bus\Query;

use App\Domain\Bus\Query\Query;
use App\Domain\Bus\Query\QueryBus as QueryBusInterface;
use Prooph\ServiceBus\Plugin\Router\QueryRouter;
use Prooph\ServiceBus\QueryBus as ProophQueryBus;
use React\Promise\PromiseInterface;

final class QueryBus implements QueryBusInterface
{
    private $bus;
    private $router;

    public function __construct()
    {
        $this->bus = new ProophQueryBus;
        $this->router = new QueryRouter();
    }

    public function register($queryClass, callable $handler): void
    {
        $this->router->route($queryClass)->to($handler);
        $this->router->attachToMessageBus($this->bus);
    }

    public function dispatch(Query $query) : PromiseInterface
    {
        return $this->bus->dispatch($query);
    }
}
