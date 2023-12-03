<?php

namespace ArchiG3nBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

#[AsCommand(
    name: 'archig3n:generate-archi',
    description: 'Generate module context folder architecture based on clean architecture and DDD',
)]
class GenerateArchiCommand extends Command
{
    public function __construct(private ParameterBagInterface $parameterBag)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        // $this
        //     ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
        //     ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        // ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        // $arg1 = $input->getArgument('arg1');

        // if ($arg1) {
        //     $io->note(sprintf('You passed an argument: %s', $arg1));
        // }

        // if ($input->getOption('option1')) {
        //     // ...
        // }

        $defaultPath = $this->parameterBag->get('archi_g3n.default_path');
        $alias = $this->parameterBag->get('archi_g3n.alias');
        $io->success("bundle configs are:  (default path) $defaultPath and (alias) $alias");
        // $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
