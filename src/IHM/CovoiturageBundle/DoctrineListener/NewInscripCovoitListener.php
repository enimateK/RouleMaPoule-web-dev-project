<?php

namespace IHM\CovoiturageBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use IHM\CovoiturageBundle\Email\InscripCovoitMail;
use IHM\CovoiturageBundle\Entity\InscripCovoit;

class NewInscripCovoitListener
{
  /**
   * @var InscripCovoitMail
   */
  private $inscripCovoitMail;

  public function __construct(InscripCovoitMail $inscripCovoitMail)
  {
    $this->inscripCovoitMail = $inscripCovoitMail;
  }

  public function postPersist(LifecycleEventArgs $args)
  {
    $entity = $args->getObject();

    // Sors si l'entité n'est pas inscripCovoit
    if (!$entity instanceof InscripCovoit) {
      return;
    }

    $this->inscripCovoitMail->sendNotif($entity);
  }
}
