<?php
 
namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nurse', name: 'app_nurse')]
class NurseController extends AbstractController
{
    // Validación de login de un enfermero
    #[Route('/login', methods: ['POST'], name: 'app_nurse_login')]
    public function nurseLogin(Request $request): JsonResponse
    {
        $firstName = $request->request->get('first_name');
        $password = $request->request->get('password');

        $json_data = file_get_contents('DATA.json');
        $data_array = json_decode($json_data, true);

        for ($i = 0; $i < count($data_array); ++$i) {
            foreach ($data_array[$i] as $desc => $value) {
                if ('first_name' == $desc && $value == $firstName) {
                    if ($data_array[$i]['password'] == $password) {
                        return $this->json(true, Response::HTTP_OK);
                    }
                }
            }
        }
        return $this->json(false, Response::HTTP_NOT_FOUND);
    }
}