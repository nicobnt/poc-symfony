<?php


namespace App\EventSubscriber;


use App\Events\BienvenueEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;


class BienvenueSubscriber implements EventSubscriberInterface
{


    public static function getSubscribedEvents()
    {
        return [
            BienvenueEvent::NAME => [
                ['messageBienvenue', 15],
                ['messageBienvenueUtilisateur', 10],
            ],
            /*KernelEvents::RESPONSE => [
                ['messageBienvenueResponse', 0],
            ],*/
        ];
    }

    public function messageBienvenue(BienvenueEvent $bienvenueEvent)
    {
        $name = $bienvenueEvent->getUserName();
        $content = "Hello " . ucfirst($name) . " !";
        $bienvenueEvent->addContent($content);
    }

    public function messageBienvenueUtilisateur(BienvenueEvent $bienvenueEvent)
    {
        $name = $bienvenueEvent->getUserName();
        $message = "Bienvenue parmi nous $name !";
        $bienvenueEvent->addContent($message);
    }

    public function messageBienvenueResponse(ResponseEvent $responseEvent)
    {
        $response = $responseEvent->getResponse();
        $content = $response->getContent();
        $response->setContent('Kernel event response :<br>' . $content);
        $responseEvent->setResponse($response);
    }
}