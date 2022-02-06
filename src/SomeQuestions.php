<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class SomeQuestions extends Command
{
    protected function configure(): void
    {
        $this
        	->setName('some_questions')
        	->setDescription('Tell me your name, age and gender')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
    	$helper = $this->getHelper('question');

        $question = new Question('Введите ваше имя: ', 'Имя не указано');
        $name = $helper->ask($input, $output, $question); 

        $question = new Question('Введите ваш возраст: ', 'Возраст не указан');
        $age = $helper->ask($input, $output, $question);

        $question = new ChoiceQuestion('Ваш пол (м)', ['м', 'ж'], 0);
        $question->setErrorMessage('Неверный выбор');
    	$gender = $helper->ask($input, $output, $question);

        $output->writeln('Здравствуйте, ' . $name . ' Ваш возраст: ' . $age . ' Ваш пол: ' . $gender);       
        
        return Command::SUCCESS;
    }
}