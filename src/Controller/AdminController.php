<?php

namespace App\Controller;

use App\Repository\JourneyRepository;
use App\Repository\LegRepository;
use App\Repository\StopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function index(StopRepository $stopRepository, LegRepository $legRepository, JourneyRepository $journeyRepository): Response
    {
        $stopsList = $stopRepository->findAll();
        $legsList = $legRepository->findAll();
        $journeysList = $journeyRepository->findAll();
        return $this->render('admin/pageAdmin.html.twig', [
            "stopsList"=>$stopsList,
            "legsList"=>$legsList,
            "journeysList"=>$journeysList,
            'controller_name' => 'AdminController',
        ]);
    }
}
