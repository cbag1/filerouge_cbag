<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ApprenantController extends AbstractController
{


    /**
     * @Route(
     *  name="add_apprenant",
     *  path="api/apprenants/",
     *  methods={"POST"},
     *  defaults={
     *          "__controller"="App\Controller\ApprenantController::addApprenant",
     *          "__api_resource_class"=Apprenant::class,
     *          "__api_collection_operation_name"="add_apprenant"
     *     }       
     * )
     * 
     */

    public function addApprenant(
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $manager,
        UserPasswordEncoderInterface $encoder
    ) {
        // $test=$request->getContent();
        // $test=$request->query->get('username');
        //$d="test";
        //$test = $request->request->all();
        // $user=$request->request->all();
        $user = $request->request->all();
        $avatar = $request->files->get("avatar");
        $user = $serializer->denormalize($user,"App\Entity\Apprenant", true);
        $avatar = fopen($avatar->getRealPath(),"rb");
        $errors = $validator->validate($user);
        if (count($errors)){
            $errors = $serializer->serialize($errors,"json");
            return new JsonResponse($errors,Response::HTTP_BAD_REQUEST,[],true);
        }
        $password = "cbag";
        $user -> setPassword($encoder -> encodePassword($user, $password));
        $user -> setAvatar($avatar);
        $manager->persist($user);
        $manager->flush();
        fclose($avatar);
        return $this->json("success",Response::HTTP_CREATED);
        // dd($test);
    }



// 
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
