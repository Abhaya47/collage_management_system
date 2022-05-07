<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    /**
     * @return JsonResponse
     * @Route("/register", name="Register")
     */
    public function register(\Symfony\Component\HttpFoundation\Request $request, UserRepository $userRepository,UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $requestData=json_decode($request->getContent(),true);
        $user=new User();
        $user->setEmail($requestData["email"]);
        $hashedPassword= $passwordHasher->hashPassword(
            $user,
            $requestData["password"]
        );
        $user->setPassword($hashedPassword);
        $userRepository->add($user,true);
        return new JsonResponse(json_encode($user),201);
    }
}