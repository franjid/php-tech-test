<?php

namespace App\Controller;

use App\Application\Query\GetSavingsHistory;
use App\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\Response;

class SavingsGetHistoryController
{
    private $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function __invoke()
    {
        $query = new GetSavingsHistory();

        $this->queryBus->dispatch($query)->done(
            function($result) {
                echo json_encode($result);
            }
        );

        return new Response;
    }
}
