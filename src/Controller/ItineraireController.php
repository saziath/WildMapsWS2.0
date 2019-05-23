<?php
namespace App\Controller;


use App\Entity\Itineraire;
use App\Repository\ItineraireRepository;
use Doctrine\Common\Persistence\ObjectManager;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItineraireController extends AbstractController {


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
     * @Route("/itineraire",name="itineraire.index")
     * @return Response
     */

    public function index():Response
    {

       //$itineraire = $this->repository->findBy(['ville' => 'cape']);
       $itineraire = $this->repository->findByName('deuxieme');
       dump($itineraire);
        $itineraire[0]->setVille("Cap");
       $this->em->flush();

        return  $this->render('itineraire/index.html.twig',[
            'current_menu' => 'itineraire'

        ]);

    }


    /**
     * @Route("/itineraire/{slug}-{id}",name="itineraire.show" , requirements={"slug":"[a -z0-9\-]*"})
     * @param Itineraire $itineraire
     * @return Response
     */

    public function show(Itineraire $itineraire ,string $slug): Response
    {

        if($itineraire->getSlug() != $slug){

            return $this ->redirectToRoute('itineraire.show',[
                'id' => $itineraire->getId(),
                'slug'=> $itineraire->getSlug()
            ],301);
        }


        return $this->render('itineraire/show.html.twig',[
            'itineraire' => $itineraire,
            'current_menu' => 'itineraires'

        ]);

    }

    /*
        $itineraire = new Itineraire();
        $itineraire ->setDescription('Good')
                    ->setActivite('Balade')
                    ->setBilletDAvion('Paris -> Cape')
                    ->setCommentaire('tres amusant ...')
                    ->setHotel('Ibis')
                    ->setPays('SA')
                    ->setVille('cape');

        $em = $this->getDoctrine()->getManager();
        $em->persist($itineraire);
        $em->flush();
*/


}