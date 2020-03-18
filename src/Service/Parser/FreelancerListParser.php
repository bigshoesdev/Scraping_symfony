<?php


namespace App\Service\Parser;


use Symfony\Component\DomCrawler\Crawler;

/**
 * Class FreelancerListParser
 *
 * @package App\Service\Parser
 */
class FreelancerListParser implements PageParser
{
    /**
     * @inheritDoc
     */
    public function parseContent(Crawler $crawler)
    {
        // TODO: parse the list and return a resultset containing of freelancer id + href (link to details page)
    }
}