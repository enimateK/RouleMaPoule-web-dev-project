<?php

namespace IHM\CovoiturageBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IHM\CovoiturageBundle\Entity\VilleArrivee;
use IHM\CovoiturageBundle\Entity\VilleDepart;


class LoadVilles implements FixtureInterface

{

  public function load(ObjectManager $manager)

  {
    $villes= array(
        1 => array('nom' => 'Paris', 'dep' => 75, 'cp' => '75000', 'lat' => 48.866667, 'long' => 2.333333),
        2 => array('nom' => 'Lyon', 'dep' => 69, 'cp' => '69000', 'lat' => 45.75000, 'long' => 4.850000),
        3 => array('nom' => 'Le Mans', 'dep' => 72, 'cp' => '72000', 'lat' => 48.000000, 'long' => 0.200000),
        4 => array('nom' => 'Marseille', 'dep' => 13, 'cp' => '13000', 'lat' => 43.300000, 'long' => 5.400000),
        5 => array('nom' => 'Nantes', 'dep' => 44, 'cp' => '44000', 'lat' => 47.217250, 'long' => -1.553360),
        6 => array('nom' => 'Toulouse', 'dep' => 31, 'cp' => '31000', 'lat' => 43.600000, 'long' => 1.433333)
    );

    foreach ($villes as $key => $uneVille) {

      $villeA = new VilleArrivee();
      $villeD = new VilleDepart();
      
      $villeA->setName($uneVille['nom']);
      $villeA->setDepartement($uneVille['dep']);
      $villeA->setCodePostal($uneVille['cp']);
      $villeA->setLongitude($uneVille['long']);
      $villeA->setLatitude($uneVille['lat']);
      
      $villeD->setName($uneVille['nom']);
      $villeD->setDepartement($uneVille['dep']);
      $villeD->setCodePostal($uneVille['cp']);
      $villeD->setLongitude($uneVille['long']);
      $villeD->setLatitude($uneVille['lat']);

      $manager->persist($villeA);
      $manager->persist($villeD);

    }

    $manager->flush();

  }

}