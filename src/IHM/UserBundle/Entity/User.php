<?php

namespace IHM\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="IHM\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
    * @ORM\OneToMany(targetEntity="IHM\CovoiturageBundle\Entity\Advert", mappedBy="user")
    */
    private $annonces;
    
    /**
    * @ORM\OneToMany(targetEntity="IHM\CovoiturageBundle\Entity\InscripCovoit", mappedBy="user")
    */
    private $inscrips;


    /**
     * Add annonce
     *
     * @param \IHM\CovoiturageBundle\Entity\Advert $annonce
     *
     * @return User
     */
    public function addAnnonce(\IHM\CovoiturageBundle\Entity\Advert $annonce)
    {
        $this->annonces[] = $annonce;

        return $this;
    }

    /**
     * Remove annonce
     *
     * @param \IHM\CovoiturageBundle\Entity\Advert $annonce
     */
    public function removeAnnonce(\IHM\CovoiturageBundle\Entity\Advert $annonce)
    {
        $this->annonces->removeElement($annonce);
    }

    /**
     * Get annonces
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }

    /**
     * Add inscrip
     *
     * @param \IHM\CovoiturageBundle\Entity\InscripCovoit $inscrip
     *
     * @return User
     */
    public function addInscrip(\IHM\CovoiturageBundle\Entity\InscripCovoit $inscrip)
    {
        $this->inscrips[] = $inscrip;

        return $this;
    }

    /**
     * Remove inscrip
     *
     * @param \IHM\CovoiturageBundle\Entity\InscripCovoit $inscrip
     */
    public function removeInscrip(\IHM\CovoiturageBundle\Entity\InscripCovoit $inscrip)
    {
        $this->inscrips->removeElement($inscrip);
    }

    /**
     * Get inscrips
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInscrips()
    {
        return $this->inscrips;
    }
}
