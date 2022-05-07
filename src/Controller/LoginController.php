<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @return JsonResponse
     * @Route("/hello",name="login")
     */

    public function login(): JsonResponse{

        return new JsonResponse(json_encode(["Successfully logged in"]),200);
    }
}