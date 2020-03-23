<?php

namespace App\Controller;

use App\Events\BienvenueEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/hello-world", name="hello-world")
     */
    public function helloWord(): Response
    {

        return new Response('Hello World!');
    }

    /**
     * @Route("/hello-world/{name}", name="hello")
     */
    public function hello(String $name, EventDispatcherInterface $eventDispatcher): Response
    {
        $bienvenueEvent = new BienvenueEvent($name);
        $eventDispatcher->dispatch($bienvenueEvent, $bienvenueEvent::NAME);
        $content = $bienvenueEvent->getContent();

        return new Response($content);
    }

    /**
     * Hello world, avec Twig cette fois :)
     *
     * @Route("/hello-twig/{name}", name="hello", requirements={"name"="\w+"})
     */
    public function helloTwig(String $name): Response
    {
        return $this->render('hello.html.twig', ['name' => $name]);
    }
}