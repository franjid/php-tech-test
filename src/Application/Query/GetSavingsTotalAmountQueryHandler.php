<?php

namespace App\Application\Query;

use App\Application\Projection\SavingsUpdateTotalAmountProjection;
use React\Promise\Deferred;

final class GetSavingsTotalAmountQueryHandler
{
    public function __invoke(GetSavingsTotalAmountQuery $query, Deferred $deferred): void
    {
        $currentTotalAmount = (float) file_get_contents(SavingsUpdateTotalAmountProjection::totalAmountFile);

        $deferred->resolve($currentTotalAmount);
    }
}
