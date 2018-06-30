<?php



namespace IHM\CoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class CoreController extends Controller

{
    public function indexAction()
    {
        return $this->render('IHMCoreBundle:Core:index.html.twig');
    }
    
    // public function contactAction(Request $request)
    // {
        // $session = $request->getSession();
        
        // $session->getFlashBag()->add('info', 'La page de contact n\'est pas encore disponible, merci de revenir plus tard');
        
        // return $this->redirectToRoute('ihm_core_home');
    // }
}