<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantWebController extends AbstractController
{
    #[Route('/restaurant/web', name: 'app_restaurant_web')]
    public function index(): Response
    {
        return $this->render('restaurant_web/index.html.twig', [
            'controller_name' => 'RestaurantWebController',
        ]);
    }
}
