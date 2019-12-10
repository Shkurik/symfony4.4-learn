<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/shkurik", name="shkurik")
     */
    public function index()
    {
        $date = date('d-m-Y');
        return $this->render('shkurik.html.twig', [
            'controller_name' => 'MainController',
            'date' => $date,
        ]);
    }
}
