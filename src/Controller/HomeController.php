<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    #[Route("/")]
    public function index(HttpClientInterface $client) {
        $todos = $client->request("GET", "https://jsonplaceholder.typicode.com/todos")->toArray();

        return $this->render("home.html.twig", [
            "todos" => $todos
        ]);
    }

    #[Route("/json")]
    public function jsonApi(HttpClientInterface $client) {
        $response = $client->request("GET", "https://jsonplaceholder.typicode.com/todos");

        return $this->json($response->toArray());
    }
}
