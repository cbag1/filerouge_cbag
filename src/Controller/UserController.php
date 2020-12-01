<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{


    /**
     * @Route(
     *  name="add_user",
     *  path="/api/admin/users",
     *  methods={"POST"},
     *  defaults={
     *          "__controller"="App\Controller\UserController::addUser",
     *          "__api_resource_class"=User::class,
     *          "__api_collection_operation_name"="add_user"
     *     }       
     * )
     */

    public function addUser(
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $manager,
        UserPasswordEncoderInterface $encoder
    ) {
        dd('fdfdf');
        //$test=$request->getContent();
        // $test=$request->query->get('username');
        //$d="test";
        $test = $request->request->all();
        // $user=$request->request->all();
        // $user = $request->request->all();
       //dd($test);
        // dd($test);
    }


    /**
     * @Route(
     *  name="update_user",
     * path="/api/admin/users/{id}",
     *  methods={"PUT"},
     *  defaults={
     *          "__controller"="App\Controller\UserController::putUser",
     *          "__api_resource_class"=User::class,
     *          "__api_item_operation_name"="put"
     *     }       
     * )
     */

    public function putUser(
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $manager,
        UserPasswordEncoderInterface $encoder
    ) {
        // $image=$request->files->get("avatar");
        // $content=$request->getContent();
        //dd($request->getContent());
        // dd($request->request->get('test'));
        // $request = $request->getCurrentRequest();
        // $imageContent = $request->getContent();
        // dd($request);
        // dd($request->headers->get('Content-Type'));
        // dd($request->getContentType());
      //  $content=file_get_contents('php://input');
       // $items = preg_split("/form-data; /", $content);
        //dd($content);
        // dd($request->headers->get('Content-Type'));
        
    }

    /**
     * @Route("/user", name="user")
     */
    // public function index(): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //         'controller_name' => 'UserController',
    //     ]);
    // }
}
