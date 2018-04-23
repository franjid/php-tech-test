<?php

declare(strict_types = 1);

namespace App\Domain\Bus\Query;

use App\Domain\Bus\Message;
use App\Types\ValueObject\Uuid;

abstract class Query extends Message
{
    private $queryId;

    public function __construct() {
        $queryId = Uuid::random()->value();

        parent::__construct(new Uuid($queryId));

        $this->queryId = $queryId;
    }

    public function messageType(): string
    {
        return 'query';
    }

    public function queryId(): string
    {
        return $this->queryId;
    }
}
