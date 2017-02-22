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
        error_log(print_r($message, true));
    }

    public function isMessageMatching(Message $message, $test, $regexMatched)
    {
        return $regexMatched;
    }
}