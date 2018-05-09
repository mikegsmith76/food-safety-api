<?php
namespace App\Command\Data\FoodSafety;

use App\Data\Import\LocalAuthority as LocalAuthorityImport;
use App\Data\Import\Business as BusinessImport;
use App\Data\Import\BusinessType as BusinessTypeImport;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Import extends Command
{
    protected $businessImport = null;
    protected $businessTypeImport = null;
    protected $localAuthorityImport = null;

    public function __construct(
        LocalAuthorityImport $localAuthorityImport,
        BusinessImport $businessImport,
        BusinessTypeImport $businessTypeImport
    )
    {
        parent::__construct('fsdata:import');

        $this->localAuthorityImport = $localAuthorityImport;
        $this->businessImport = $businessImport;
        $this->businessTypeImport = $businessTypeImport;
    }

    protected function configure()
    {
        $this->addArgument('file_path', InputArgument::REQUIRED, 'Path to directory containing XML files');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = realpath($input->getArgument('file_path'));

        $files = glob($filePath . DIRECTORY_SEPARATOR . '*.xml');

        foreach ($files as $file) {
            $this->localAuthorityImport->process($file);
            $this->businessTypeImport->process($file);
            $this->businessImport->process($file);
        }
    }
}