<?php

namespace App\Controller;

use LengthException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NurseController extends AbstractController
{
    #[Route('/nurse', name: 'app_nurse')]
    public function index(): Response {   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            //$passwd = $_POST['passwd'];
            //echo $username;
        }
        //$username = $_POST['username'];
        //$passwd = $_POST['passwd'];
        $json_data = file_get_contents('/home/ericb/Projects/exemple_projecte/src/Controller/DATA.json');
        $data_array = json_decode($json_data, true);
        for ($i=0; $i < count($data_array); $i++) { 
            foreach ($data_array[$i] as $desc => $value){
                if ($desc == "first_name" && $value == "si") {
                    if($data_array[$i]["password"] == "si"){
                        return new Response("SI");
                    };
                }
            }
        };
        return new Response($value);
    }
}
