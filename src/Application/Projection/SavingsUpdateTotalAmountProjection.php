<?php

namespace App\Application\Projection;

use App\Domain\Bus\Event\Event;
use App\Domain\Projection;

final class SavingsUpdateTotalAmountProjection implements Projection
{
    const totalAmountFile = __DIR__ . '/../../../data/total';

    public function execute(Event $event): void
    {
        $amountToAdd = (float) $event->data()['amount'];
        $currentTotalAmount = (float) file_get_contents(self::totalAmountFile);

        $file = fopen(self::totalAmountFile, 'w');
        fwrite($file, $currentTotalAmount + $amountToAdd);
        fclose($file);
    }
}
