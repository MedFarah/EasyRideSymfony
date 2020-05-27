<?php

namespace ReclamationBundle\Controller;

use AppBundle\Entity\User;
use FOS\UserBundle\Model\UserInterface;
use Ob\HighchartsBundle\Highcharts\Highchart;
use ReclamationBundle\Entity\Reclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Reclamation controller.
 *
 * @Route("reclamation")
 */
class ReclamationController extends Controller
{
    /**
     * Lists all reclamation entities.
     *
     * @Route("/user", name="reclamation_index_user")
     * @Method("GET")
     * @param Request $request
     * @return Response
     */
    public function indexUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $reclamation = new Reclamation();
        $form = $this->createFormBuilder($reclamation)->add('status',TextType::class
            ,[
                'label' => 'Chercher :',
                'attr' => ['class' => 'form-control']
            ])->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $term=$reclamation->getStatus();
            $entities = $em->getRepository('ReclamationBundle:Reclamation')->searchByUser($term,$user->getId());
        }
        else{
            $entities = $em->getRepository('ReclamationBundle:Reclamation')->findBy( ['idUser' => $user->getId()]);
        }



        $reclamations = $this->get('knp_paginator')->paginate(
            $entities, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            7 /*limit per page*/
        );



        return $this->render('@Reclamation/reclamation/index.html.twig', array(
            'reclamations' => $reclamations,
            'user'=>$user,
            'form' => $form->createView(),
        ));
    }


    /**
     * Lists all reclamation entities.
     *
     * @Route("/", name="reclamation_index")
     * @Method("GET")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $reclamation = new Reclamation();
        $form = $this->createFormBuilder($reclamation)->add('status',TextType::class
            ,[
                'label' => 'Chercher :',
                'attr' => ['class' => 'form-control']
            ])->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $term=$reclamation->getStatus();
            $entities = $em->getRepository('ReclamationBundle:Reclamation')->search($term);
        }
        else{
            $entities = $em->getRepository('ReclamationBundle:Reclamation')->findAll();
        }

            $user = $this->get('security.token_storage')->getToken()->getUser();

        $reclamations = $this->get('knp_paginator')->paginate(
            $entities, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            7 /*limit per page*/
        );

        return $this->render('@Reclamation/reclamation/acc.html.twig', array(
            'reclamations' => $reclamations,
            'user'=>$user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new reclamation entity.
     *
     * @Route("/chart", name="reclamation_chart")
     * @Method({"GET"})
     */
    public function chartAction(Request $request)
    {
        // Chart
        $data=array(
            array('Evenement',$this->Calcul_nbr_reclamation("Evenement")),
            array('Location',$this->Calcul_nbr_reclamation("Location")),
            array('Commande',$this->Calcul_nbr_reclamation("Commande")),
            array('Maintenance',$this->Calcul_nbr_reclamation("Maintenance"))
        );

        $series = array(
            array("type"=>"pie", "name" => "Reclamation",    "data" => $data)
        );

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');  // The #id of the div where to render the chart
        $ob->title->text('Reclamations');
        $ob->xAxis->title(array('text'  => "Horizontal axis title"));
        $ob->yAxis->title(array('text'  => "Vertical axis title"));
        $ob->series($series);
        $ob->plotOptions->pie(array(
            'allowPointSelect'=>true,
            'cursor'=>'pointer',
            'dataLabels'=>array('enabled'=>false),
            'showInLegend'=>true
        ));

        return $this->render('@Reclamation/reclamation/chart.html.twig', array(
            'chart' => $ob,
        ));
    }


    /**
     * Lists all reclamation entities.
     *
     * @Route("/indexcn1", name="reclamation_index_cn1")
     * @Method("GET")
     * @param Request $request
     * @return Response
     */
    public function indexCoedeNameOneAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $reclamation = new Reclamation();
        $form = $this->createFormBuilder($reclamation)->add('status',TextType::class
            ,[
                'label' => 'Chercher :',
                'attr' => ['class' => 'form-control']
            ])->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $term=$reclamation->getStatus();
            $entities = $em->getRepository('ReclamationBundle:Reclamation')->search($term);
        }
        else{
            $entities = $em->getRepository('ReclamationBundle:Reclamation')->findAll();
        }

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $reclamations = $this->get('knp_paginator')->paginate(
            $entities, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            7 /*limit per page*/
        );

        $serial = new Serializer([new ObjectNormalizer()]);
        $formated = $serial->normalize($entities);
        return new JsonResponse($formated);
        /* return $this->render('@Reclamation/reclamation/acc.html.twig', array(
             'reclamations' => $reclamations,
             'user'=>$user,
             'form' => $form->createView(),
         )); */
    }

    /**
     * Creates a new reclamation entity.
     *
     * @Route("/add", name="reclamation_add")
     * @Method({"GET","POST"})
     */
    public function addCodeNameOneAction(Request $request)
    {
       $user = $this->get('security.token_storage')->getToken()->getUser();
        $reclamation = new Reclamation();

                $reclamation->setImage("aec4046149cd8703fd73c655f40d4be5.jpeg");
            $reclamation->setStatus("En attente");
            $reclamation->setDescription("Description");
            $reclamation->setEmail($request->get('email'));
            $reclamation->setTypereclamation($request->get('type'));
            $reclamation->setObjet($request->get('objet'));
          // $u = new User();
        $product = $this->getDoctrine()
            ->getRepository(User::class)
            ->find('4');
            $reclamation->setIdUser($product);
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();



        $serial = new Serializer([new ObjectNormalizer()]);
        $formated = $serial->normalize($reclamation);
        return new JsonResponse($formated);
    }


    /**
     * Displays a form to edit an existing reclamation entity.
     *
     * @Route("/{id}/editCodeName", name="reclamation_edit_codeName")
     * @Method({ "POST"})
     */
    public function editCodeNameOneAction(Request $request, Reclamation $reclamation)
    {

        $reclamation = $this->getDoctrine()->getManager()->getRepository(Reclamation::class)->find($request->get('id'));
        $reclamation->setStatus($request->get('status'));
        $reclamation->setObjet($request->get('objet'));
        $reclamation->setDescription($request->get('description'));
        $reclamation->setEmail($request->get('email'));
        $reclamation->setTypereclamation($request->get('type'));
            $this->getDoctrine()->getManager()->flush();


        $serial = new Serializer([new ObjectNormalizer()]);
            $fora = $serial->normalize($reclamation);
            return new JsonResponse($fora);
    }

    /**
     * Displays a form to edit an existing reclamation entity.
     *
     * @Route("/{id}/deleteCodeName", name="reclamation_delete_codeName")
     * @Method({ "DELETE"})
     */
    public function deleteCodeNameOneAction(Request $request, Reclamation $reclamation)
    {
        if($request->get('s')==1){
        $reclamation = $this->getDoctrine()->getManager()->getRepository(Reclamation::class)->find($request->get('id'));
       $em = $this->getDoctrine()->getManager();
        $em->remove($reclamation);
        $em->flush();

        $serial = new Serializer([new ObjectNormalizer()]);
        $fora = $serial->normalize($reclamation);
        return new JsonResponse($fora); }
        else{
            $reclamation = $this->getDoctrine()->getManager()->getRepository(Reclamation::class)->find($request->get('id'));
            $reclamation->setStatus("Traiter");
            $this->getDoctrine()->getManager()->flush();
            $serial = new Serializer([new ObjectNormalizer()]);
            $fora = $serial->normalize($reclamation);
            return new JsonResponse($fora);
        }
    }


    /**
     * Creates a new reclamation entity.
     *
     * @Route("/new", name="reclamation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $reclamation = new Reclamation();
        $form = $this->createFormBuilder($reclamation)
            ->add('image', FileType::class, array('label' => 'Image(JPG) '))
            ->add('datereclamation',DateType::class,array('widget' => 'single_text',
                'label' => 'Date Reclamation ',
                // prevents rendering it as type="date", to avoid HTML5 date pickers
                'html5' => true,

                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],))
            ->add('typereclamation', ChoiceType::class, array(
                'label' => 'Type Reclamation ',
                'attr' => ['class' => 'form-control'],
                'choices'  => array(
                    "Evenement" => "Evenement",
                    "Location" => "Location",
                    "Commande" => "Commande",
                    "Maintenance" => "Maintenance"
                ),
            ))
            ->add('objet', TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextareaType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $reclamation->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $fileName);
            $reclamation->setImage($fileName);
            $reclamation->setStatus("En attente");
            $reclamation->setEmail($user->getEmail());
            $reclamation->setIdUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('reclamation_index_user');
        }

        return $this->render('@Reclamation/reclamation/new.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing reclamation entity.
     *
     * @Route("/{id}/editUser", name="reclamation_edit_user")
     * @Method({"GET", "POST"})
     */
    public function editUserAction(Request $request, Reclamation $reclamation)
    {
        // $deleteForm = $this->createDeleteForm($reclamation);
        // $editForm = $this->createForm('ReclamationBundle\Form\ReclamationType', $reclamation);
        $reclamation->setStatus("En traitement");
        $this->getDoctrine()->getManager()->flush();
        $f = $this->createFormBuilder($reclamation)
            ->add('datereclamation',DateType::class,array('widget' => 'single_text',
                'disabled'=>true,
                'label' => 'Date Reclamation ',
                // prevents rendering it as type="date", to avoid HTML5 date pickers
                'html5' => true,

                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],))
            ->add('typereclamation', ChoiceType::class, array(
                'label' => 'Type Reclamation ',
                'attr' => ['class' => 'form-control'],
                'choices'  => array(
                    "Evenement" => "Evenement",
                    "Location" => "Location",
                    "Commande" => "Commande",
                    "Maintenance" => "Maintenance"
                ),
            ))
            ->add('objet', TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextareaType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->getForm();
        $f->handleRequest($request);

        if ($f->isSubmitted()) {
            $this->addFlash('success', 'Reclamation modifier avec succes!!');
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('reclamation_index_user');
        }

        return $this->render('@Reclamation/reclamation/traiter.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $f->createView(),
        ));
    }





    /**
     * Displays a form to edit an existing reclamation entity.
     *
     * @Route("/{id}/edit", name="reclamation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reclamation $reclamation)
    {
       // $deleteForm = $this->createDeleteForm($reclamation);
       // $editForm = $this->createForm('ReclamationBundle\Form\ReclamationType', $reclamation);
        $reclamation->setStatus("En traitement");
        $this->getDoctrine()->getManager()->flush();
        $f = $this->createFormBuilder($reclamation)
            ->add('objet', TextType::class,[
            'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextareaType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', TextType::class, [
                'disabled' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->getForm();
        $f->handleRequest($request);

        if ($f->isSubmitted()) {
            $reclamation->setStatus("Traiter");

            $message = \Swift_Message::newInstance()
                ->setSubject($reclamation->getObjet())
                ->setFrom('hamouchka7@gmail.com')
                ->setTo($reclamation->getEmail())
                ->setBody($reclamation->getDescription());

            $this->get('mailer')->send($message);
            $this->addFlash('success', 'Reclamation traité avec succes!!');
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('reclamation_index');
        }

        return $this->render('@Reclamation/reclamation/traiter.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $f->createView(),
        ));
    }





    /**
     * Deletes a reclamation entity.
     *
     * @Route("/{id}", name="reclamation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reclamation $reclamation)
    {
       // $form = $this->createDeleteForm($reclamation);
        $form = $this->createFormBuilder($reclamation)
            ->add('typereclamation', TextType::class, [
                'label' => 'Type Reclamation',
                'attr' => ['class' => 'form-control']
            ])
            ->add('objet', TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextareaType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', TextType::class, [
                'disabled' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('submit', 'Symfony\Component\Form\Extension\Core\Type\SubmitType', array('label' => 'Delete',
                'attr' => array(
                    'onclick' => 'return confirm("Are you sure?")'
                )))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $this->addFlash('success', 'Reclamation supprimé avec succes!!');
            $em->remove($reclamation);
            $em->flush();
            return $this->redirectToRoute('reclamation_index');
        }


        return $this->render('@Reclamation/reclamation/delete.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to delete a reclamation entity.
     *
     * @param Reclamation $reclamation The reclamation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reclamation $reclamation)
    {
         $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('reclamation_delete', array('id' => $reclamation->getId())))
            ->setMethod('DELETE')
            ->add('submit', 'Symfony\Component\Form\Extension\Core\Type\SubmitType', array('label' => 'Delete',
                'attr' => array(
                    'onclick' => 'return confirm("Are you sure?")'
                )))
            ->getForm()
        ;
        return $this->render('@Reclamation/reclamation/delete.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ));
    }
    private function Calcul_nbr_reclamation($ch){
        //
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT COUNT(p)
    FROM ReclamationBundle:Reclamation p
    WHERE p.typereclamation = :tr'
        )->setParameter('tr', $ch);

        $products =  $query->setMaxResults(1)->getOneOrNullResult();
        //convert array to string
        $nbrString = implode(" ",$products);
        return (int)$nbrString;
    }


}
