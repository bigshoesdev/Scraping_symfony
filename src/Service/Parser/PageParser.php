<?php


namespace App\Service\Parser;


use Symfony\Component\DomCrawler\Crawler;

/**
 * Interface PageParser
 *
 * @package App\Service\Parser
 */
interface PageParser
{
    /**
     * @param Crawler $crawler
     * @return array
     */
    public function parseContent(Crawler $crawler);

}