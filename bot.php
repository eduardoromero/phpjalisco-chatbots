<?php
require 'vendor/autoload.php';
require 'EduardoRomero/PhpChatBot/MessagesLoggerMiddleware.php';

use Mpociot\BotMan\BotManFactory;
use Mpociot\BotMan\BotMan;
use EduardoRomero\PhpChatBot\MessagesLoggerMiddleware;

$config = [
    'telegram_token' => 'ENTER_TOKEN_HERE',
];


// create an instance
$bot = BotManFactory::create($config);

$bot->middleware(new MessagesLoggerMiddleware()); // Logging Messages

// give the bot something to listen for.
$bot->hears('hello|hi', function (BotMan $botInstance) {
    $botInstance->reply('Hello 👋!');
});

$bot->fallback(function(BotMan $botInstance) {
    $botInstance->reply('I did not quite get that...');
});


// start listening
$bot->listen();