<?php

namespace App\Controller;

use App\Repository\StopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StopController extends AbstractController
{
    /**
     * @Route("/stop", name="app_stop")
     */
    public function index(): Response
    {
        return $this->render('stop/index.html.twig', [
            'controller_name' => 'StopController',
        ]);
    }

    /**
     * @Route("/stopList", name="stop_list")
     */
    public function stopList (StopRepository $stopRepository): Response{
        $stopsList = $stopRepository->findAll();
        return $this->render( 'stop/stopList.html.twig', [
            "stopsList"=>$stopsList
            ] );
    }

    /**
     * @Route("/stop/detail/{id}", name="stop_detail")
     */
    public function stopDetail (int $id, StopRepository $stopRepository): Response
    {
        $stop=$stopRepository->find($id);
        return $this->render('stop/stopDetail.html.twig',
            [
                "stop"=>$stop
            ]);
    }
}
