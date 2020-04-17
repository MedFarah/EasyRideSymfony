<?php

namespace LivraisonBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LivraisonBundle\Entity\Livraison;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function indexAction()
    {  
        return $this->render('LivraisonBundle:Default:index.html.twig');
    }

    public function adminlistAction(){
        $em = $this->getDoctrine()->getManager();
        $tache = $em->getRepository('LivraisonBundle:Livraison')->findAll();
        return $this->render('@Livraison/Default/livraison.admin.html.twig',array('tache'=>$tache));
    }

    public function agenttachesAction(){
        return $this->render('@Livraison/Default/livraison.agent.html.twig');
    }

    public function addAction(Request $request){
        $tache = new Livraison();
        $form = $this->createForm('LivraisonBundle\Form\LivraisonType', $tache);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tache);
            $em->flush();
            return $this->redirectToRoute('livraison_view', array( 'id' => $tache->getId() ));
        }
        return $this->render('@Livraison/Default/livraison.add.html.twig', array(
            'tache' => $tache,
            'form' => $form->createView()));
    }
    
    public function viewAction(Request $request){
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $tache = $em->getRepository('LivraisonBundle:Livraison')->find($id);
        return $this->render('@Livraison/Default/livraison.view.html.twig',array('tache'=>$tache));
    }

    public function agentaddAction(Request $request){
        return $this->render('@Livraison/Default/agent.add.html.twig');
    }

    public function agentlistAction(){
        return $this->render('@Livraison/Default/agent.list.html.twig');
    }

    public function agentviewAction(){
        return $this->render('@Livraison/Default/agent.view.html.twig');
    }

    public function agenteditAction(Request $request){
        return $this->render('@Livraison/Default/agent.edit.html.twig');
    }

    public function admineditAction(Request $request){
        return $this->render('@Livraison/Default/admin.edit.html.twig');
    }


}
