<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Repeat extends Command
{
    protected function configure(): void
    {
        $this
        	->setName('repeat')
        	->setDescription('repeat some times')
            ->addArgument('string', InputArgument::REQUIRED, 'Which string do you want to repeat?')
            ->addOption(
                'times',
                't',
                InputOption::VALUE_OPTIONAL,
                'How many times do you want to repeat string',
                2
            )
    	;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $string = $input->getArgument('string');
        $times = $input->getOption('times');        

        for ($i=0; $i < $times; $i++) { 
         	$output->writeln($string);
         }               
        
        return Command::SUCCESS;
    }
}