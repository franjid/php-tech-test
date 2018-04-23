<?php

namespace App\Application\Event;

use App\Domain\Bus\Event\Event;
use App\Domain\EventStore;

class EventStoreCsv implements EventStore
{
    const csvFile = __DIR__ . '/../../../data/event_store.csv';

    public function save(Event $event): void
    {
        $file = fopen(self::csvFile, 'a');

        fputcsv(
            $file,
            [
                $event->eventId(),
                $event->eventName(),
                json_encode($event->data(), JSON_NUMERIC_CHECK),
                $event->occurredOn()
            ],
            ',',
            '\''
        );

        fclose($file);
    }
}
