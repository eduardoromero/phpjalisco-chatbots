<?php
namespace EduardoRomero\PhpChatBot;

use Mpociot\BotMan\Conversation;

class CertificacionConversation extends Conversation
{
    private $_convocatoria_abierta = true;

    public function tryConvocatoria() {
        if($this->_convocatoria_abierta) {
            $this->showConvocatoria();
        } else {
            $this->convocatoriaCerrada();
        }
    }

    public function convocatoriaCerrada() {
        $_ciclo_actual = date('Y');
        $this->say( '🤔 ');
        $this->say( "⌛️ La convocatoria $_ciclo_actual ha cerrado.");
    }

    public function showConvocatoria() {
        $this->say('📄'. "Puedes consultar la convocatoria para Certificación en:  \n\n 👉 http://www.compac.org.mx/files/certificacion_2017.pdf");
    }

    public function run()
    {
        $this->tryConvocatoria();
    }
}