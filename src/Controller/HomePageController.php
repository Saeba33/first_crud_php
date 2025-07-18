<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomePageController extends AbstractController
{
    #[Route('/home/page', name: 'app_home_page')]
    public function homePage(): Response
    {
        return $this->render('home_page/homePage.html.twig', [
            'toto_name' => 'HomePageController',
        ]);
    }
}