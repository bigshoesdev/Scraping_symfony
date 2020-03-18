<?php


namespace App\Command;

use App\Service\GulpScraper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GetAllFreelancerCommand
 *
 * @package App\Command
 */
class GetAllFreelancerCommand extends Command
{
    protected static $defaultName = 'scraper:get-all-freelancer';

    /**
     * @var GulpScraper
     */
    private $freelancerMapScraper;

    public function __construct(GulpScraper $freelancerMapScraper)
    {
        parent::__construct(self::$defaultName);

        $this->freelancerMapScraper = $freelancerMapScraper;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->freelancerMapScraper->getFreelancer();
        
        return 0;
    }
}