<?php

namespace IHM\CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VilleArrivee
 *
 * @ORM\Table(name="ville_arrivee")
 * @ORM\Entity(repositoryClass="IHM\CovoiturageBundle\Repository\VilleArriveeRepository")
 */
class VilleArrivee
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="departement", type="integer")
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=255)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", precision=10, scale=8)
     */
    private $latitude;
    
    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", precision=10, scale=8)
     */
    private $longitude;



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
     * Set name
     *
     * @param string $name
     *
     * @return VilleArrivee
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set departement
     *
     * @param integer $departement
     *
     * @return VilleArrivee
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return integer
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return VilleArrivee
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return VilleArrivee
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return VilleArrivee
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
