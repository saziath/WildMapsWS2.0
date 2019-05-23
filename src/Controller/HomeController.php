<?php
namespace App\Controller;

use App\Repository\ItineraireRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController{


    /**
     * @Route("/",name="home")
     * @param ItineraireRepository $repository
     * @return Response
     */
    public function index(ItineraireRepository $repository):Response
    {

        $itineraires = $repository->findByCountry('SA');

        return  $this->render('pages/home.html.twig',[

            'itineraires'  => $itineraires

        ]);

    }

}