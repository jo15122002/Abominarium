<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ChangePasswordController extends AbstractController
{

    #[Route('/change/password', name: 'app_change_password')]
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher, UserRepository $userRepository): Response
    {
        $userData = $this->getUser();

        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }

        $userId = $userData->getUserIdentifier();

        $form = $this->createForm(ChangePasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oldPassword = $form->get('oldPassword')->getData();
            $newPassword = $form->get('newPassword')->getData();

            $user = $userRepository->findOneBy(['email' => $userId]);
            
            if (!$passwordHasher->isPasswordValid($user, $oldPassword)) {
                $form->get('oldPassword')->addError(new FormError("Current password is not valid"));
            } else {
                $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
                $userRepository->save($user, true);

                $this->addFlash('success', 'Password changed successfully');
                return $this->redirectToRoute('app_user_show', ['id' => $user->getId()]);
            }

        } else {
            $form->get('newPassword')->addError(new FormError("New password does not match"));
        }

        return $this->render('change_password/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
