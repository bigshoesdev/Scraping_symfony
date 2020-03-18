<?php


namespace App\Service;

use App\MessageBus\Message\GetFreelancerDetailsMessage;
use App\Service\Parser\FreelancerListParser;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class GulpScraper
 *
 * @package App\Service
 */
class GulpScraper
{
    /**
     * @var GulpClient
     */
    private $client;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    /**
     * GulpScraper constructor.
     *
     * @param LoggerInterface $logger
     * @param MessageBusInterface $messageBus
     * @param GulpClient $client
     */
    public function __construct(LoggerInterface $logger, MessageBusInterface $messageBus, GulpClient $client)
    {
        $this->logger = $logger;
        $this->messageBus = $messageBus;
        $this->client = $client;
    }

    public function getFreelancer()
    {
        $this->client->login();

        $next = "https://www.gulp.de/direkt/app/api/secure/expert-profiles/search";

        do {
            $freelancerList = $this->client->getClient()->request("POST", $next,
                ['json' =>
                    ['expertTypes' => ['FREELANCER', 'EMPLOYEE'],
                        'availabilityPercent' => '20',
                        'onlySwissFreelancers' => false,
                        'searchTerm' => null,
                        'workCity' => null,
                        'availabilityDate' => null,
                        'paymentCurrency' => 'EUR',
                        'paymentMin' => 0,
                        'paymentMax' => 150,
                        'residence' => null,
                        'residenceRadius' => null]]);

            $content = json_decode($freelancerList->getContent(), true);

            foreach ($content['objects'] ?? [] as $freelancer) {
                $id = $freelancer['profile']['id'];
                $href = sprintf("https://www.gulp.de/direkt/app/api/secure/expert-profiles/%s", $id);
                $this->messageBus->dispatch(new GetFreelancerDetailsMessage($id, $href));
            }

            // FIXME: using the commented out code will iterate the complete list
            $next = null;
//            $next = $this->findNextPage($content);
        } while ($next !== null);
    }

    /**
     * @param array $content
     * @return mixed|null
     */
    private
    function findNextPage(array $content)
    {
        foreach ($content['links'] as $link) {
            if ($link['rel'] === "next") {
                return $link['href'];
            }
        }

        return null;
    }

}