<?php
 
namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
 
class NurseController extends AbstractController
{
    #[Route('/nurse', name: 'app_nurse')]
    public function index(Request $request): Response {
        if ($request->isMethod('POST')) {
            $firstName = $request->request->get('first_name');
            $password = $request->request->get('password');
           
            $json_data = file_get_contents('/home/ericb/Projects/exemple_projecte/src/Controller/DATA.json');
            $data_array = json_decode($json_data, true);
 
            for ($i = 0; $i < count($data_array); $i++) {
                foreach ($data_array[$i] as $desc => $value) {
                    if ($desc == "first_name" && $value == $firstName) {
                        if ($data_array[$i]["password"] == $password) {
                            return new Response(true);
                        }
                    }
                }
            }
 
            return new Response(content: false);
        }
 
        // Si la petición no es POST, devolver un mensaje o una vista
        return new Response('Por favor, envía los datos mediante un formulario POST.');
    }
}