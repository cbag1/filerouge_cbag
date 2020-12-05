<?php

namespace App\Controller;

use App\Repository\GroupeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupeController extends AbstractController
{

    /**
     * @Route(
     * name="list_apprenants",
     * path="api/admin/groupes/{id}/apprenants",
     * methods={"GET"},
     * defaults={
     *          "__controller"="App\Controller\GroupeController::list_apprenants",
     *          "__api_resource_class"=Grptags::class,
     *          "__api_collection_operation_name"="list_apprenants"
     *     }  
     * )
     * 
     */


    public function list_apprenants(GroupeRepository $repo_apprenant, $id){
        // dd("VOila ça marche legui");
        //  dd($id);
         $groupe= $repo_apprenant->find($id)->getApprenants();
        //  dd($groupe->getApprenants());
        return $this->json($groupe,Response::HTTP_OK);

     }
    // /**
    //  * @Route("/groupe", name="groupe")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('groupe/index.html.twig', [
    //         'controller_name' => 'GroupeController',
    //     ]);
    // }
}
