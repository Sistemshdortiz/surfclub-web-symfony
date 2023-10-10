<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TableRepository;

class DishController extends AbstractController
{
    /**
     * @Route("/dishes", name="table")
     */
    public function showTable(\App\Repository\DishRepository $tableRepository): Response
    {
        $tableData = $tableRepository->findAll();

        return $this->render('dishes/index.html.twig', [
            'tableData' => $tableData,
        ]);
    }
}
