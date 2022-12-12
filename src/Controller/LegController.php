<?php

namespace App\Controller;

use App\Entity\Leg;
use App\Form\LegType;
use App\Repository\LegRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Routing\Annotation\Route;

class LegController extends AbstractController
{
    /**
     * @Route("/leg", name="app_leg")
     */
    public function index(): Response
    {
        return $this->render('leg/index.html.twig', [
            'controller_name' => 'LegController',
        ]);
    }

    /**
     * @Route("/legList", name="leg_list")
     */
    public function legList (LegRepository $legRepository): Response{
        $legsList = $legRepository->findAll();
        return $this->render( 'leg/legList.html.twig', [
            "legsList"=>$legsList
        ] );
    }

    /**
     * @Route("/leg/detail/{id}", name="leg_detail")
     */
    public function legDetail (int $id, LegRepository $legRepository): Response
    {
        $leg=$legRepository->find($id);
        return $this->render('leg/legDetail.html.twig',
            [
                "leg"=>$leg
            ]);
    }

    /**
     * @Route("/leg/create", name="leg_create")
     */
    public function createLeg(Request $request, EntityManagerInterface $entityManager): Response
    {
        $leg = new Leg();
        $legForm= $this->createForm(LegType::class, $leg);
        $legForm->handleRequest($request);

        if ($legForm->isSubmitted()){
            $leg->setDateCreatedLeg(new \DateTime());
            $leg->setDateModifiedLeg(new \DateTime());
            $entityManager->persist($leg);
            $entityManager->flush();
            $this->addFlash('success', 'Nouveau parcours enregistrée!');
            return $this->redirectToRoute('leg_detail', ['id'=>$leg->getId()]);
        }

        return $this->render('leg/legCreate.html.twig' , [
            "legForm"=>$legForm->createView(),
    ]);
        
    }
}
