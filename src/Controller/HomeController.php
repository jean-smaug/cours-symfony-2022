<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    #[Route("/")]
    public function index() {
        $this->render("");
    }

    #[Route("/json")]
    public function jsonApi(HttpClientInterface $client) {
        $response = $client->request("GET", "https://jsonplaceholder.typicode.com/todos");

        return $this->json($response->toArray());
    }
}
