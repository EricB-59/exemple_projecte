<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class NurseController extends AbstractController
{
    #[Route('/nurse', name: 'app_nurse')]
    public function index(): JsonResponse
    {
        $nurses = json_decode(file_get_contents('DATA.json', '..'), true);
        return $this->json($nurses);
    }
}
