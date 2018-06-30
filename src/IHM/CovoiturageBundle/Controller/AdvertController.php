<?php

// Ceci est le controlleur s'occupant des annonces(adverts)  

namespace IHM\CovoiturageBundle\Controller;

use IHM\CovoiturageBundle\Entity\Advert;
use IHM\CovoiturageBundle\Entity\InscripCovoit;
use IHM\CovoiturageBundle\Form\AdvertType;
use IHM\CovoiturageBundle\Form\InscripCovoitType;
use IHM\CovoiturageBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



class AdvertController extends Controller

{

    // Appelle la page d'accueil
  public function indexAction($page)

  {
    // Empeche un numéro de page inférieur
    if ($page < 1) 
    {
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }
    // Set le nombre d'annonces par pages
    $nbAdParPage = 3;
    // Récupère toutes les annonces et les pagine
    $listAdverts = $this->getDoctrine()
        ->getManager()
        ->getRepository('IHMCovoiturageBundle:Advert')
        ->getAdvertsPage($page, $nbAdParPage);
    // Compte le nombre de pages requises
    $nbPages = ceil(count($listAdverts) / $nbAdParPage);
    // Empeche un numéro de page supérieur
    if ($page > $nbPages)
    {
        throw $this->createNotFoundException("Cette page n'existe pas");
    }

    return $this->render('IHMCovoiturageBundle:Advert:index.html.twig', array('listAdverts' => $listAdverts, 'nbPages' => $nbPages, 'page' => $page,));

  }

// Voir une annonce
  public function viewAction($id)

  {
    $em = $this->getDoctrine()->getManager();
  
    $repository = $this->getDoctrine()->getManager()->getRepository('IHMCovoiturageBundle:Advert');
    
    $advert = $repository->find($id);
    // Mauvais ID
    if ($advert === null)
    {
        throw new NotFoundHttpException("L'annonce d'id $id n'existe pas.");
    }


    return $this->render('IHMCovoiturageBundle:Advert:view.html.twig', array('advert' => $advert,));

  }
    // ajouter une annonce
    /**
    * @Security("has_role('ROLE_USER')")
    */
  public function addAction(Request $request)

  {
    
    $advert = new Advert();
    // Pour avoir la date du jour dans le formulaire
    $advert->setDateDepart(new \Datetime());
    // Création du formulaire
    $form = $this->get('form.factory')->create(AdvertType::class, $advert);
    // Envoi du formulaire
     if ($request->isMethod('POST')) 
    {
      $form->handleRequest($request);
    // Formulaire valide
      if ($form->isValid()) 
      {
        $advert->setUser($this->getUser());
        
        $em = $this->getDoctrine()->getManager();

        $em->persist($advert);

        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Votre annonce a bien été enregistrée.');

        return $this->redirectToRoute('ihm_covoiturage_view', array('id' => $advert->getId()));
      }
    }

    return $this->render('IHMCovoiturageBundle:Advert:add.html.twig', array('form' => $form->createView(),));

  }
   // S'inscrire à un covoiturage
    /**
    * @Security("has_role('ROLE_USER')")
    */
  public function addInscripAction($id, Request $request)

  {
    $em = $this->getDoctrine()->getManager();
    $advert = $em->getRepository('IHMCovoiturageBundle:Advert')->find($id);
    // mauvais id 
    if ($advert === null)
    {
        throw new NotFoundHttpException("L'annonce d'id $id n'existe pas.");
    }

    
    $inscripCovoit = new InscripCovoit();

    $form = $this->get('form.factory')->create(InscripCovoitType::class, $inscripCovoit);
    
     if ($request->isMethod('POST')) 
    {
      $form->handleRequest($request);

      if ($form->isValid()) 
      {
          // recupération de l'utilisateur existant
        $inscripCovoit->setUser($this->getUser());
        
        // recupération de l'annonce correspondante
        $inscripCovoit->setAdvert($advert);
        
        

        $em->persist($inscripCovoit);

        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Votre inscription a bien été enregistrée.');
        
        return $this->redirectToRoute('ihm_covoiturage_view', array('id' => $inscripCovoit->getAdvert()->getId()));
      }
    }
    
    return $this->render('IHMCovoiturageBundle:Advert:addInscrip.html.twig', array('form' => $form->createView(),));

  }
    // Editer une annonce
    /**
    * @Security("has_role('ROLE_USER')")
    */
  public function editAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    
    $advert = $em->getRepository('IHMCovoiturageBundle:Advert')->find($id);
    
    if ($advert === null)
    {
        throw new NotFoundHttpException("L'annonce d'id $id n'existe pas.");
    }
    
    $form = $this->get('form.factory')->create(AdvertType::class, $advert);
    
    if ($request->isMethod('POST'))
    {
      $form->handleRequest($request);

      if ($form->isValid()) 
      {
        $em = $this->getDoctrine()->getManager();

        $em->persist($advert);

        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Votre annonce a bien été modifiée.');

        return $this->redirectToRoute('ihm_covoiturage_view', array('id' => $advert->getId()));
      }
    }

    return $this->render('IHMCovoiturageBundle:Advert:edit.html.twig', array('advert' => $advert, 'form' => $form->createView(),));
  }
    // Supprimer une annonce
    /**
    * @Security("has_role('ROLE_USER')")
    */
  public function deleteAction(Request $request, $id)

  {
    // recuperation de l'annonce
    $em = $this->getDoctrine()->getManager();
    
    $advert = $em->getRepository('IHMCovoiturageBundle:Advert')->find($id);
    
    if ($advert === null)
    {
        throw new NotFoundHttpException("L'annonce d'id $id n'existe pas.");
    }
    
    $form = $this->get('form.factory')->create();
    
    if ($request->isMethod('POST') AND $form->handleRequest($request)->isValid())
    {
        $em->remove($advert);
        $em-> flush();
        $request->getSession()->getFlashBag()->add('info', "Votre annonce à bien été supprimée.");
        
        return $this->redirectToRoute('ihm_covoiturage_home');
    }
    
    return $this->render('IHMCovoiturageBundle:Advert:delete.html.twig', array('advert' => $advert, 'form' => $form->createView(),));

  }
  // Voir les annonces de l'utilisateur
  /**
    * @Security("has_role('ROLE_USER')")
    */
  public function viewAdvertsAction()

  {
    $em = $this->getDoctrine()->getManager();
  
    $repository = $this->getDoctrine()
        ->getManager()
        ->getRepository('IHMCovoiturageBundle:Advert')
    ;
    
    $adverts = $repository->findBy(array ('user' => $this->getUser()));

    return $this->render('IHMCovoiturageBundle:Advert:viewAdverts.html.twig', array('adverts' => $adverts,));

  }
  // Voir les annonces ou l'utilisateur est inscrit
  /**
    * @Security("has_role('ROLE_USER')")
    */
  public function viewInscripsAction()

  {
    $em = $this->getDoctrine()->getManager();
  
    $repository = $this->getDoctrine()->getManager()->getRepository('IHMCovoiturageBundle:InscripCovoit');
    
    $inscrips = $repository->findBy(array ('user' => $this->getUser()));

    return $this->render('IHMCovoiturageBundle:Advert:viewInscrips.html.twig', array('inscrips' => $inscrips,));

  }
  // Rechercher une annonce
  public function searchAction(Request $request)

  {

    $form = $this->get('form.factory')->create(SearchType::class);
    
     if ($request->isMethod('POST')) 
    {
        $form->handleRequest($request);
      
       $em = $this->getDoctrine()->getManager();
  
        $repository = $this->getDoctrine()->getManager()->getRepository('IHMCovoiturageBundle:Advert');
    
        $listAdverts = $repository->getAdvertsParVilles ($form["villeDepart"]->getData(), $form["villeArrivee"]->getData());

        

        return $this->render('IHMCovoiturageBundle:Advert:results.html.twig', array('listAdverts' => $listAdverts));
      
    }

    return $this->render('IHMCovoiturageBundle:Advert:search.html.twig', array('form' => $form->createView(),));

  }
  
  //Affchage des dernieres annonces dans le menu
  public function menuAction($limit)
  {
      $em = $this->getDoctrine()->getManager();
      
      $listAdverts = $em->getRepository('IHMCovoiturageBundle:Advert')->findBy(array(), array('date' => 'desc'), $limit, 0);
      
      return $this->render('IHMCovoiturageBundle:Advert:menu.html.twig', array('listAdverts' => $listAdverts));
  }
  // Affichage su flux rss dans le menu
  public function rssAction($limit)
  {
      
      $url = "http://actualite.lachainemeteo.com/meteo-rss/toute-l-actualite-meteo.xml?xtdate=20170321";
      $rss = simplexml_load_file($url);;
      
      return $this->render('IHMCovoiturageBundle:Advert:rss.html.twig', array('rss' => $rss));
  }
  


}