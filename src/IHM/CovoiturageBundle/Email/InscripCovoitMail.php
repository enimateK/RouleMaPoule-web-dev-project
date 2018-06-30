<?php

namespace IHM\CovoiturageBundle\Email;

use IHM\CovoiturageBundle\Entity\InscripCovoit;

class InscripCovoitMail
{
    
    /**
    * @var \Swift_Mailer
    */
    private $mailer;
    
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    
    public function sendNotif(InscripCovoit $inscripCovoit)
    {
        $message = new \Swift_Message(
            'Une personne s\'est inscrite à votre annonce',
            'Une personne s\'est inscrite à votre annonce'  
        );
        
        $message->addTo($inscripCovoit->getAdvert()->getUser()->getEmail()); 
        $message->addFrom('noreply@covoiturage.fr');
        
        $this->mailer->send($message);
    }
    
}