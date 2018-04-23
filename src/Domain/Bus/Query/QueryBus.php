<?php

namespace App\Domain\Bus\Query;

use React\Promise\PromiseInterface;

interface QueryBus
{
    public function register($queryClass, callable $handler) : void;

    public function dispatch(Query $query) : PromiseInterface;
}
