<?php

namespace EduardoRomero\PhpChatBot;

use Mpociot\BotMan\Message;
use Mpociot\BotMan\Interfaces\DriverInterface;
use Mpociot\BotMan\Interfaces\MiddlewareInterface;

class MessagesLoggerMiddleware implements MiddlewareInterface
{
    public function handle(Message &$message, DriverInterface $driver)
    {
        /* we log the Message */
        $payload  = $message->getPayload();
        $username = @$payload['chat']['username'];

        error_log( $driver->getName() .'/'. $message->getUser() . ' '. $username . ': ' . $message->getMessage());
    }

    public function isMessageMatching(Message $message, $test, $regexMatched)
    {
        return $regexMatched;
    }
}