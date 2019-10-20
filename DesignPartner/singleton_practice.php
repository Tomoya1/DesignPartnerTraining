<?php

class TicketSingleton
{
    private static $ticket;
    private $ticketNum = 100;

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$ticket == null) {
            self::$ticket = new TicketSingleton();
        }
        return self::$ticket;
    }

    public function getNextTicketNum()
    {
       return $this->ticketNum++;
    }
}

$ticket = TicketSingleton::getInstance();

print_r($ticket->getNextTicketNum());
print_r($ticket->getNextTicketNum());
