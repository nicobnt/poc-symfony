<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
    public function hello($name): Response
    {
        $name = ucfirst($name);
        return new Response("Hello $name");
    }
}