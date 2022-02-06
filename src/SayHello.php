<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class SayHello extends Command
{
    protected function configure(): void
    {
        $this
        	->setName('say_hello')
        	->setDescription('Say hello to someone')
            ->addArgument('string', InputArgument::REQUIRED, 'Who do you want to greet')            
    	;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $string = 'Привет, ' . $input->getArgument('string'); 

        $output->writeln($string);       
        
        return Command::SUCCESS;
    }
}