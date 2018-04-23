<?php

namespace App\Controller;

use App\Application\Command\AddAmountToSavingsCommand;
use App\Domain\Bus\Command\CommandBus;
use App\Types\ValueObject\Amount;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SavingsPostController
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(Request $request)
    {
        $requestParameters = json_decode($request->getContent(), true);

        $command = new AddAmountToSavingsCommand(
            new Amount($requestParameters['amount'])
        );

        $this->commandBus->dispatch($command);

        return new Response('', Response::HTTP_ACCEPTED);
    }
}
