<?php

namespace App\Controller;


use App\Form\ProfileType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profile", name="user_profile", methods={"GET", "POST"})
     */
    public function profil(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $currentUser = $userRepository->find($this->getUser());
        $profileForm = $this->createForm(ProfileType::class, $currentUser);
        $profileForm->handleRequest($request);

        if ($profileForm->isSubmitted() && $profileForm->isValid()) {

//            line to keep the image's data'
            $file=$profileForm->get('avatar')->getData();

            // encode the plain password
            $currentUser->setPassword(
                $userPasswordHasher->hashPassword(
                    $currentUser,
                    $profileForm->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($currentUser);
            $entityManager->flush();
            // do anything else you need here, like send an email

//            line to tranfer the img into the db with a new file name
            if ($file){
                $newFilename = $currentUser->getPseudo()."-".$currentUser->getId().".".$file->guessExtension();
                $file->move($this->getParameter('upload_field_img_dir'), $newFilename);
                $currentUser->setAvatar($newFilename);
            }

            //il faut repeter le flush
            $entityManager->persist($currentUser);
            $entityManager->flush();

            $this->addFlash('success', 'La modification a bien été enregistrée');
            return $this->redirectToRoute("main_home");

//            return $userAuthenticator->authenticateUser(
//                $user,
//                $authenticator,
//                $request
//            );
        }



        return $this->renderForm('user/profile.html.twig', [
            'profileForm' => $profileForm,
        ]);
    }
}
