<?php

namespace IHM\CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="IHM\CovoiturageBundle\Repository\VilleRepository")
 */
class Ville
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
     * @return Ville
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
     * @return Ville
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return int
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
     * @return Ville
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
     * Set coordonnees
     *
     * @param string $coordonnees
     *
     * @return Ville
     */
    public function setCoordonnees($coordonnees)
    {
        $this->coordonnees = $coordonnees;

        return $this;
    }

    /**
     * Get coordonnees
     *
     * @return string
     */
    public function getCoordonnees()
    {
        return $this->coordonnees;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Ville
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
     * @return Ville
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
