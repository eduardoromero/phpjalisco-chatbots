<?php
namespace EduardoRomero\PhpChatBot;

use Mpociot\BotMan\Conversation;
use Mpociot\BotMan\Question;
use Mpociot\BotMan\Button;
use Mpociot\BotMan\Answer;


class MenuConversation extends Conversation
{

    public function showMenu()
    {
        $this->say('Puedes preguntarme sobre Certificación y sobre Recertificación');
        $this->say('¿Cómo te puedo ayudar?');
    }

    public function run()
    {
        $this->showMenu();
    }
}