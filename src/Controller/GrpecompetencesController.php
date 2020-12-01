<?php

namespace App\Controller;

use App\Repository\CompetencesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GrpecompetencesController extends AbstractController
{

       /**
     * @Route(
     * name="list_competences",
     * path="api/admin/grpecompetences/{id}/competences",
     * methods={"GET"},
     * defaults={
     *          "__controller"="App\Controller\GrpecompetencesController::list_competences",
     *          "__api_resource_class"=Grpecompetences::class,
     *          "__api_collection_operation_name"="list_competences"
     *     }  
     * )
     * 
     */


    public function list_competences(Request $request,CompetencesRepository $repocompets, $id){
        // dd("VOila ça marche legui");
      //dd($id);
        $groupe= $repocompets->findByGrpecompetences($id);
        return $this->json($groupe,Response::HTTP_OK);

     }

    // /**
    //  * @Route("/grpecompetences", name="grpecompetences")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('grpecompetences/index.html.twig', [
    //         'controller_name' => 'GrpecompetencesController',
    //     ]);
    // }
}
