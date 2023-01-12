<?php

namespace App\Controller;

use App\Entity\Stop;
use App\Form\StopType;
use App\Repository\StopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/stop/create", name="stop_create")
     */
    public function createStop(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stop = new Stop();

        $stopForm = $this->createForm(StopType::class, $stop);
        $stopForm->handleRequest($request);


        if ($stopForm->isSubmitted()){
            $stop->setDateCreatedStop(new \DateTime());
            $stop->setDateModifiedStop(new \DateTime());
            $entityManager->persist($stop);
            $entityManager->flush();
            $this->addFlash('success', 'Nouvel étape enregistrée!');
            return $this->redirectToRoute('stop_detail', ['id'=>$stop->getId()]);

        }

        return $this->render('stop/stopCreate.html.twig', [
            "stopForm"=>$stopForm->createView(),

        ]);
    }

    /**
     * @Route("/stop/modifydetail/{id}", name="stop_modifyDetail", requirements={"id"="\d+"})
     */
    public function modifyStopDetail (int $id, Request $request, StopRepository $stopRepository, EntityManagerInterface $entityManager): Response
    {

        $stop=$stopRepository->find($id);

        $modifyStopForm = $this->createForm(StopType::class, $stop);
        $modifyStopForm->handleRequest($request);

        if ($modifyStopForm->isSubmitted() && $modifyStopForm->isValid()) {
            $stop->setDateModifiedStop(new \DateTime());
            $entityManager->persist($stop);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'L\'étape a bien été modifiée'
            );

            return $this->redirectToRoute('stop_detail', ['id' => $stop->getId()]);
        }

        return $this->renderForm('stop/stopModifyDetail.html.twig', [
            "stop"=>$stop,
            'modifyStopForm' => $modifyStopForm
        ]);

    }


    /**
     * @Route("/stop/deletedetail/{id}", name="stop_deleteDetail", requirements={"id"="\d+"})
     */
    public function deleteStopDetail (int $id, StopRepository $stopRepository, EntityManagerInterface $entityManager): Response
    {

        $stop=$stopRepository->find($id);


            $entityManager->remove($stop);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'L\'étape a bien été supprimée'
            );

            return $this->redirectToRoute('admin_dashboard');

    }



}
