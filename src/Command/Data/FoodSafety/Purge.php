<?php

namespace App\Command\Data\FoodSafety;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Purge extends Command
{
    /**
     * @var \Pdo
     */
    protected $connection;

    public function __construct(
        \Pdo $connection
    )
    {
        parent::__construct('fsdata:purge');

        $this->connection = $connection;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('PURGE Starting');

        $output->writeln('PURGE Removing Local Authorities');
        $this->connection->exec('TRUNCATE local_authority');

        $output->writeln('PURGE Removing Business Types');
        $this->connection->exec('TRUNCATE business_type');

        $output->writeln('PURGE Removing Businesses');
        $this->connection->exec('TRUNCATE business');

        $output->writeln('PURGE Complete');
    }
}