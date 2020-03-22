<?php

namespace App\EventListener;

use App\Events\BienvenueEvent;

class BienvenueListener
{
    public function messageBienvenue(BienvenueEvent $bienvenueEvent)
    {
        $name = $bienvenueEvent->getUserName();
        $message = "Listner : $name !";
        $bienvenueEvent->addContent($message);
    }
}