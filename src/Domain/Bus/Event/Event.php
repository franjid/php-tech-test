<?php

declare(strict_types = 1);

namespace App\Domain\Bus\Event;

use App\Domain\Bus\Message;
use App\Types\ValueObject\Uuid;
use DateTimeImmutable;

abstract class Event extends Message
{
    private $eventId;
    private $data;
    private $occurredOn;

    public function __construct(array $data = []) {
        $eventId = Uuid::random()->value();

        parent::__construct(new Uuid($eventId));

        $this->eventId = $eventId;
        $this->data = $data;
        $this->occurredOn  = (new DateTimeImmutable())->format('Y-m-d H:i:s');
    }

    abstract public static function eventName(): string;

    public function messageType(): string
    {
        return 'event';
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function occurredOn(): string
    {
        return $this->occurredOn;
    }
}
