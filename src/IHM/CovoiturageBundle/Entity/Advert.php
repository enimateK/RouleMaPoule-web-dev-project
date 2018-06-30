<?php

namespace IHM\CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Advert
 *
 * @ORM\Table(name="advert")
 * @ORM\Entity(repositoryClass="IHM\CovoiturageBundle\Repository\AdvertRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Advert
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Assert\DateTime()
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\Length(min=10)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @ORM\Column(name="published", type="boolean")
     */
    private $published=true;
    
    /**
    * @ORM\Column(name="updated_at", type="datetime", nullable=true)
    */
    private $updatedAt;
    
    /**
    * @ORM\Column(name="nb_inscrip", type="integer")
    */
    private $nbInscrip = 0;
    
    /**
    * @ORM\Column(name="date_depart", type="datetime")
    * @Assert\DateTime()
    */
    private $dateDepart;
    
    /**
    * @ORM\Column(name="prix_trajet", type="decimal")
    * @Assert\Range(min=1, max =150)
    */
    private $prixTrajet;
    
    /**
    * @ORM\Column(name="nb_places", type="integer")
    * @Assert\Range(min=1, max =10)
    */
    private $nbPlaces;
    
    /**
    * @ORM\Column(name="heure_depart", type="time")
    * @Assert\Time()
    */
    private $heureDepart;
    
    /**
    * @ORM\Column(name="fumeur", type="boolean")
    */
    private $fumeur;
    
    /**
    * @ORM\OneToMany(targetEntity="IHM\CovoiturageBundle\Entity\InscripCovoit", mappedBy="advert")
    */
    private $inscripCovoit;
    
    /**
    * @ORM\ManyToOne(targetEntity="IHM\CovoiturageBundle\Entity\VilleDepart", cascade={"persist"})
    */
    private $villeDepart;
    
    /**
    * @ORM\ManyToOne(targetEntity="IHM\CovoiturageBundle\Entity\VilleArrivee", cascade={"persist"})
    */
    private $villeArrivee;
    
    /**
    * @ORM\ManyToOne(targetEntity="IHM\UserBundle\Entity\User", inversedBy="annonces")
    * @ORM\JoinColumn(nullable=false)
    */
    private $user;
   
     
     public function __construct()
     {
         $this->date = new \Datetime();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Advert
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
     * Set title
     *
     * @param string $title
     *
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Advert
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
     * Set content
     *
     * @param string $content
     *
     * @return Advert
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Advert
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

   

    /**
     * Add inscripCovoit
     *
     * @param \IHM\CovoiturageBundle\Entity\InscripCovoit $inscripCovoit
     *
     * @return Advert
     */
    public function addInscripCovoit(\IHM\CovoiturageBundle\Entity\InscripCovoit $inscripCovoit)
    {
        $this->inscripCovoit[] = $inscripCovoit;
        
        $inscripCovoit->setAdvert($this);

        return $this;
    }

    /**
     * Remove inscripCovoit
     *
     * @param \IHM\CovoiturageBundle\Entity\InscripCovoit $inscripCovoit
     */
    public function removeInscripCovoit(\IHM\CovoiturageBundle\Entity\InscripCovoit $inscripCovoit)
    {
        $this->inscripCovoit->removeElement($inscripCovoit);
    }

    /**
     * Get inscripCovoit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInscripCovoit()
    {
        return $this->inscripCovoit;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Advert
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    /**
     * @ORM\PreUpdate
     */
     
    public function updateDate()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * Set nbInscrip
     *
     * @param integer $nbInscrip
     *
     * @return Advert
     */
    public function setNbInscrip($nbInscrip)
    {
        $this->nbInscrip = $nbInscrip;

        return $this;
    }

    /**
     * Get nbInscrip
     *
     * @return integer
     */
    public function getNbInscrip()
    {
        return $this->nbInscrip;
    }
    
    public function incInscrip()
    {
        $this->nbInscrip++;
    }
    
    public function decInscrip()
    {
        $this->nbInscrip--;
    }

    /**
     * Set villeDepart
     *
     * @param string $villeDepart
     *
     * @return Advert
     */
    public function setVilleDepart($villeDepart)
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    /**
     * Get villeDepart
     *
     * @return string
     */
    public function getVilleDepart()
    {
        return $this->villeDepart;
    }

    /**
     * Set villeArrivee
     *
     * @param string $villeArrivee
     *
     * @return Advert
     */
    public function setVilleArrivee($villeArrivee)
    {
        $this->villeArrivee = $villeArrivee;

        return $this;
    }

    /**
     * Get villeArrivee
     *
     * @return string
     */
    public function getVilleArrivee()
    {
        return $this->villeArrivee;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return Advert
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set prixTrajet
     *
     * @param string $prixTrajet
     *
     * @return Advert
     */
    public function setPrixTrajet($prixTrajet)
    {
        $this->prixTrajet = $prixTrajet;

        return $this;
    }

    /**
     * Get prixTrajet
     *
     * @return string
     */
    public function getPrixTrajet()
    {
        return $this->prixTrajet;
    }

    /**
     * Set nbPlaces
     *
     * @param integer $nbPlaces
     *
     * @return Advert
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * Get nbPlaces
     *
     * @return integer
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    /**
     * Set heureDepart
     *
     * @param \DateTime $heureDepart
     *
     * @return Advert
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * Get heureDepart
     *
     * @return \DateTime
     */
    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    /**
     * Set fumeur
     *
     * @param boolean $fumeur
     *
     * @return Advert
     */
    public function setFumeur($fumeur)
    {
        $this->fumeur = $fumeur;

        return $this;
    }

    /**
     * Get fumeur
     *
     * @return boolean
     */
    public function getFumeur()
    {
        return $this->fumeur;
    }


    /**
     * Add villeDepart
     *
     * @param \IHM\CovoiturageBundle\Entity\VilleDepart $villeDepart
     *
     * @return Advert
     */
    public function addVilleDepart(\IHM\CovoiturageBundle\Entity\VilleDepart $villeDepart)
    {
        $this->villeDepart[] = $villeDepart;

        return $this;
    }

    /**
     * Remove villeDepart
     *
     * @param \IHM\CovoiturageBundle\Entity\VilleDepart $villeDepart
     */
    public function removeVilleDepart(\IHM\CovoiturageBundle\Entity\VilleDepart $villeDepart)
    {
        $this->villeDepart->removeElement($villeDepart);
    }

    /**
     * Add villeArrivee
     *
     * @param \IHM\CovoiturageBundle\Entity\VilleArrivee $villeArrivee
     *
     * @return Advert
     */
    public function addVilleArrivee(\IHM\CovoiturageBundle\Entity\VilleArrivee $villeArrivee)
    {
        $this->villeArrivee[] = $villeArrivee;

        return $this;
    }

    /**
     * Remove villeArrivee
     *
     * @param \IHM\CovoiturageBundle\Entity\VilleArrivee $villeArrivee
     */
    public function removeVilleArrivee(\IHM\CovoiturageBundle\Entity\VilleArrivee $villeArrivee)
    {
        $this->villeArrivee->removeElement($villeArrivee);
    }
}
