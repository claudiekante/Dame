<?php

namespace App\Controller;

use App\Entity\Journey;
use App\Form\JourneyType;
use App\Repository\JourneyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JourneyController extends AbstractController
{
    /**
     * @Route("/journey", name="app_journey")
     */
    public function index(): Response
    {
        return $this->render('journey/index.html.twig', [
            'controller_name' => 'JourneyController',
        ]);
    }

    /**
     * @Route("/journeyList", name="journey_list")
     */
    public function journeyList (JourneyRepository $journeyRepository): Response{
        $journeysList = $journeyRepository->findAll();
        return $this->render( 'journey/journeyList.html.twig', [
            "journeysList"=>$journeysList
        ] );
    }

    /**
     * @Route("/journey/detail/{id}", name="journey_detail")
     */
    public function journeyDetail (int $id, JourneyRepository $journeyRepository): Response
    {
        $journey=$journeyRepository->find($id);
        return $this->render('journey/journeyDetail.html.twig',
            [
                "journey"=>$journey
            ]);
    }

    /**
     * @Route("/journey/create", name="journey_create")
     */
    public function createLeg(Request $request, EntityManagerInterface $entityManager): Response
    {
        $journey = new Journey();
        $journeyForm= $this->createForm(JourneyType::class, $journey);
        $journeyForm->handleRequest($request);

        if ($journeyForm->isSubmitted()){
            $entityManager->persist($journey);
            $entityManager->flush();
            $this->addFlash('success', 'Nouveau voyage enregistrée!');
            return $this->redirectToRoute('journey_detail', ['id'=>$journey->getId()]);
        }

        return $this->render('journey/journeyCreate.html.twig' , [
            "journeyForm"=>$journeyForm->createView(),
        ]);
    }


}
