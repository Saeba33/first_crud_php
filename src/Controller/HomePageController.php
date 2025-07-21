<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\CrudType;
use App\Entity\Crud;

final class HomePageController extends AbstractController
{
    #[Route('/home/page', name: 'app_home_page')]
    public function homePage(): Response
    {
        return $this->render('home_page/homePage.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    #[Route('/create', name: 'app_create_form')]
    public function create_form(Request $request, EntityManagerInterface $entityManager): Response
    {
        $crud = new Crud();
        $form = $this->createForm(CrudType::class, $crud);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($crud);
            $entityManager->flush();

            return $this->redirectToRoute('app_home_page');
        }

        return $this->render('form/createForm.html.twig', [
            'controller_name' => 'HomePageController',
            'form' => $form->createView(),
        ]);
    }
}
