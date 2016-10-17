<?php

namespace Console;

use Knp\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command{

	protected function configure()
	{
		$this->setName('test')
	          ->setDescription('Test command');
	}
	
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln("Hello world!");
	}

}
