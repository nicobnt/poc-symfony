<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Functional test for the controllers defined inside BlogController.
 *
 * See https://symfony.com/doc/current/book/testing.html#functional-tests
 *
 * Execute the application tests using this command (requires PHPUnit to be installed):
 *
 *     $ cd your-symfony-project/
 *     $ ./vendor/bin/phpunit
 */
class IndexControllerTest extends WebTestCase
{
    public function testHelloWorld()
    {
        $client = static::createClient();
        $client->catchExceptions(false);
        $client->request('GET', '/hello-world');

        self::assertContains(
            'Hello World',
            $client->getResponse()->getContent(),
            'Sans argument, la page Hello World ne fonctionne pas'
        );
    }

    public function testHelloWorldWithArguments()
    {
        $client = static::createClient();
        $client->catchExceptions(false);
        $client->request('GET', '/hello-world/zozor');

        self::assertContains(
            'Hello Zozor',
            $client->getResponse()->getContent(),
            'Avec "zozor", la page Hello Zozor ne fonctionne pas'
        );
    }

    public function testHelloWorldWithAnEvent()
    {
        $client = static::createClient();
        $client->catchExceptions(false);
        $client->request('GET', '/hello-world/zozor');

        self::assertContains(
            'Bienvenue parmi nous zozor !',
            $client->getResponse()->getContent(),
            'L\'événement ne fonctionne pas'
        );
    }
}