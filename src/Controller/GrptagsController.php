<?php

namespace App\Controller;

use App\Repository\TagsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GrptagsController extends AbstractController
{

    /**
     * @Route(
     * name="list_tags",
     * path="api/admin/grptags/{id}/tags",
     * methods={"GET"},
     * defaults={
     *          "__controller"="App\Controller\GrptagsController::list_tags",
     *          "__api_resource_class"=Grptags::class,
     *          "__api_collection_operation_name"="list_tags"
     *     }  
     * )
     * 
     */


     public function list_tags(Request $request,TagsRepository $repotags, $id){
        // dd("VOila ça marche legui");
        //  dd($id);
         $groupe= $repotags->findByGrptags($id);
        return $this->json($groupe,Response::HTTP_OK);

     }



     /**
     * @Route("/grptags", name="grptags")
     */
    // public function index(): Response
    // {
    //     return $this->render('grptags/index.html.twig', [
    //         'controller_name' => 'GrptagsController',
    //     ]);
    // }
}
