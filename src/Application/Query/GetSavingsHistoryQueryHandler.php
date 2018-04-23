<?php

namespace App\Application\Query;

use App\Application\Event\EventStoreCsv;
use React\Promise\Deferred;

final class GetSavingsHistoryQueryHandler
{
    public function __invoke(GetSavingsHistory $query, Deferred $deferred): void
    {
        $file = fopen(EventStoreCsv::csvFile, 'r');

        $dataArray = [];

        while (($data = fgetcsv($file)) !== FALSE) {
            $dataArray[] = [
                'eventId' => $data[0],
                'eventName' => $data[1],
                'data' => $data[2],
                'dateTime' => $data[3]
            ];
        }

        $deferred->resolve($dataArray);
    }
}
