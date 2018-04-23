<?php

namespace App\Controller;

use App\Application\Command\AddAmountToSavingsCommand;
use App\Application\Command\AddAmountToSavingsCommandHandler;
use App\Domain\Bus\Command\CommandBus;
use App\Types\ValueObject\Uuid;
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
        $command = new AddAmountToSavingsCommand(
            Uuid::random(),
            //$request->get('amount'),
            1234
        );

        $this->commandBus->register(AddAmountToSavingsCommand::class, new AddAmountToSavingsCommandHandler());
        $this->commandBus->dispatch($command);

        return new Response(
            '<html><body>DONE</body></html>'
        );
    }
}
