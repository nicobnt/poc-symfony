<?php


namespace App\Events;


use Symfony\Contracts\EventDispatcher\Event;

class BienvenueEvent extends Event
{
    public const NAME = 'bienvenue.utilisateur';

    private $userName;

    private $content;

    public function __construct(String $userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return String
     */
    public function getUserName(): String
    {
        return $this->userName;
    }

    /**
     * @return String
     */
    public function getContent(): String
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent(String $content): void
    {
        $this->content = $content;
    }

    /**
     * @param mixed $content
     */
    public function addContent(String $content): void
    {
        $this->content .= $content . '<br>';
    }

}