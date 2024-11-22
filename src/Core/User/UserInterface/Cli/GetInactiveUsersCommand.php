<?php

namespace App\Core\User\UserInterface\Cli;

use App\Common\Bus\QueryBusInterface;
use App\Core\User\Application\Query\GetInactiveUsersQuery;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:user:get-inactive',
    description: 'Pobieranie e-maili nieaktywnych użytkowników'
)]
class GetInactiveUsersCommand extends Command
{
    public function __construct(private readonly QueryBusInterface $bus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $emails = $this->bus->dispatch(new GetInactiveUsersQuery());

        foreach ($emails as $email) {
            $output->writeln($email);
        }

        return Command::SUCCESS;
    }
}