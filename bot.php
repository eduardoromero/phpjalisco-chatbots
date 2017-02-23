<?php
require 'vendor/autoload.php';
require 'EduardoRomero/PhpChatBot/MessagesLoggerMiddleware.php';
require 'EduardoRomero/PhpChatBot/MenuConversation.php';
require 'EduardoRomero/PhpChatBot/CertificacionConversation.php';

use Mpociot\BotMan\BotManFactory;
use Mpociot\BotMan\BotMan;
use Mpociot\BotMan\Middleware\ApiAi;
use EduardoRomero\PhpChatBot\MessagesLoggerMiddleware;
use EduardoRomero\PhpChatBot\MenuConversation;
use EduardoRomero\PhpChatBot\CertificacionConversation;

$API_AI_DEVELOPER_TOKEN   = getenv('API_AI_DEVELOPER_TOKEN') ?: "ENTER_TOKEN_HERE";
$TELEGRAM_TOKEN = getenv('TELEGRAM_TOKEN') ?: "ENTER_TOKEN_HERE";

define('API_AI_DEVELOPER_TOKEN', $API_AI_DEVELOPER_TOKEN);
define('TELEGRAM_TOKEN', $TELEGRAM_TOKEN);

$config = [
    'telegram_token' => TELEGRAM_TOKEN,
];


// create an instance
$bot = BotManFactory::create($config);

$bot->middleware(new MessagesLoggerMiddleware()); // Logging Messages

// This will catch all incoming messages and will send them thru API.AI
$bot->hears('.*', function(BotMan $botInstance) {
    $botInstance->types();

    // The incoming message matched the "link-certificacion" on API.ai
    $extras = $botInstance->getMessage()->getExtras();
    error_log(print_r($extras, true));

    $apiReply   = $extras['apiReply'];
    $apiAction  = $extras['apiAction'];
    $apiIntent  = $extras['apiIntent'];

    switch ($apiIntent) {
        case 'input.welcome':
            $botInstance->reply($apiReply);

        case 'menu':
            $botInstance->startConversation(new MenuConversation);

            break;
        case 'certificacion':
            $botInstance->startConversation(new CertificacionConversation);

            break;
        case 'recertificacion':
            //$botInstance->startConversation(new CertificacionConversation);
            $botInstance->reply($apiReply);

            break;
        default:
            $botInstance->reply($apiReply);
    }

})->middleware(ApiAi::create(API_AI_DEVELOPER_TOKEN)->listenForAction());


// start listening
$bot->listen();