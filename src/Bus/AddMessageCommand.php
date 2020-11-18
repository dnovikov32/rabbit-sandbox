<?php

declare(strict_types=1);

namespace App\Bus;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class AddMessageCommand extends Command
{
    protected static $defaultName = 'add-message';

    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        parent::__construct();

        $this->bus = $bus;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add new message to queue')
            ->addArgument('message', InputArgument::REQUIRED, 'Message')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $id = rand(1,10000);
        $message = $input->getArgument('message');

        $this->bus->dispatch(new EventMessage($id, ['message' => $message]));

        $io->success($input->getArgument('message'));

        return Command::SUCCESS;
    }
}
