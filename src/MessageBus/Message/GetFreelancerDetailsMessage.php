<?php


namespace App\MessageBus\Message;

/**
 * Class GetFreelancerDetailsMessage
 *
 * @package App\MessageBus\Message
 */
final class GetFreelancerDetailsMessage
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $href;

    /**
     * GetFreelancerDetailsMessage constructor.
     *
     * @param string $id
     * @param string $href
     */
    public function __construct(string $id, string $href)
    {
        $this->id = $id;
        $this->href = $href;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }
}