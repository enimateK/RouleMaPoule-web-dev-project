<?php

namespace IHM\CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InscripCovoit
 *
 * @ORM\Table(name="inscrip_covoit")
 * @ORM\Entity(repositoryClass="IHM\CovoiturageBundle\Repository\InscripCovoitRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class InscripCovoit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    
    
    /**
    * @ORM\ManyToOne(targetEntity="IHM\CovoiturageBundle\Entity\Advert", inversedBy="inscripCovoit")
    * @ORM\JoinColumn(nullable=false)
    */
    private $advert;
    
    /**
    * @ORM\ManyToOne(targetEntity="IHM\UserBundle\Entity\User", inversedBy="inscrips")
    * @ORM\JoinColumn(nullable=false)
    */
    private $user;
    
    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return InscripCovoit
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return InscripCovoit
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return InscripCovoit
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set advert
     *
     * @param \IHM\CovoiturageBundle\Entity\Advert $advert
     *
     * @return InscripCovoit
     */
    public function setAdvert(\IHM\CovoiturageBundle\Entity\Advert $advert)
    {
        $this->advert = $advert;

        return $this;
    }

    /**
     * Get advert
     *
     * @return \IHM\CovoiturageBundle\Entity\Advert
     */
    public function getAdvert()
    {
        return $this->advert;
    }
    
    /**
    * @ORM\PrePersist
    */
    public function increase()
    {
        $this->getAdvert()->incInscrip();
    }
    
    /**
    * @ORM\PreRemove
    */
    public function decrease()
    {
        $this->getAdvert()->decInscrip();
    }
}
