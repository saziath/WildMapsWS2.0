<?php
namespace App\Controller\Admin;

use App\Entity\Itineraire;
use App\Form\ItineraireType;
use App\Repository\ItineraireRepository;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminItineraireController extends AbstractController{


    /**
     * @var ItineraireRepository
     */
    private $repository ;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ItineraireRepository $repository,ObjectManager $em)
    {
        $this->repository = $repository;


        $this->em = $em;
    }


    /**
     * @Route("/admin",name ="admin.itineraire.index")
     * @return Response
     */



    public function index()
    {



        $itineraires =  $this->repository->findAll();

        return $this->render('admin/itineraire/index.html.twig',compact('itineraires'));

    }

    /**
     * @Route("/admin/itineraire/create",name ="admin.itineraire.new")
     * @return Response
     */



    public function new(Request $request)
    {

        $itineraire = new Itineraire();
        $form =$this->createForm(ItineraireType::class,$itineraire);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->em->persist($itineraire);
            $this->em->flush();
            $this->addFlash('Succes','Element cree');

            return $this->redirectToRoute('admin.itineraire.index');

        }
        return $this->render('admin/itineraire/new.html.twig',[

            'itineraire' => $itineraire ,
            'form' => $form->createView()

        ]);

    }








    /**
     * @Route("/admin/itineraire/{id}", name ="admin.itineraire.edit",methods="GET|POST")
     * @param Itineraire $itineraire
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function edit(Itineraire $itineraire,Request $request)
    {


        $form =$this->createForm(ItineraireType::class,$itineraire);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->em->flush();
            $this->addFlash('Succes','Element modifie');
            return $this->redirectToRoute('admin.itineraire.index');

        }

        return $this->render('admin/itineraire/edit.html.twig',[

            'itineraire' => $itineraire ,
            'form' => $form->createView()

        ]);

    }


    /**
     * @Route("/admin/itineraire/{id}", name ="admin.itineraire.delete" , methods="DELETE")
     * @param Itineraire $itineraire
     * @return RedirectResponse
     */



    public function delete(Itineraire $itineraire,Request $request)
    {

        if($this->isCsrfTokenValid('delete' . $itineraire->getId(),$request->get('_token'))){

            $this->em->remove($itineraire);
            $this->em->flush();
   //         return new Response('Supprime');
        }
       // return new Response('Suppression');




        return $this->redirectToRoute('admin.itineraire.index');



    }







}