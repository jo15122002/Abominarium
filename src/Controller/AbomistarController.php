<?php

namespace App\Controller;

use App\Entity\Abomistar;
use App\Form\AbomistarType;
use App\Repository\AbomistarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/abomistar')]
class AbomistarController extends AbstractController
{
    public function __construct(
        AbomistarRepository $abomistarRepository
    )
    {
        $this->abomistarRepository = $abomistarRepository;
    }

    #[Route('/', name: 'app_abomistar_index', methods: ['GET'])]
    public function index(AbomistarRepository $abomistarRepository): Response
    {
        return $this->render('abomistar/index.html.twig', [
            'abomistars' => $abomistarRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_abomistar_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AbomistarRepository $abomistarRepository): Response
    {
        $abomistar = new Abomistar();
        $form = $this->createForm(AbomistarType::class, $abomistar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $abomistarRepository->save($abomistar, true);

            return $this->redirectToRoute('app_abomistar_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('abomistar/new.html.twig', [
            'abomistar' => $abomistar,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_abomistar_show', methods: ['GET'])]
    public function show(string $id): Response
    {
        $aboList = $this->abomistarRepository->findAll();
        if($id < $aboList[0]->getId()){
            $id = $aboList[0]->getId();
        }else if($id > $aboList[count($aboList)-1]->getId()){
            $id = $aboList[count($aboList)-1]->getId();
        }
        return $this->render('abomistar/show.html.twig', [
            'abomistar' => $this->abomistarRepository->findBy(['id' => $id])[0]
        ]);
    }

    #[Route('/{id}/edit', name: 'app_abomistar_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Abomistar $abomistar, AbomistarRepository $abomistarRepository): Response
    {
        $form = $this->createForm(AbomistarType::class, $abomistar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $abomistarRepository->save($abomistar, true);

            return $this->redirectToRoute('app_abomistar_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('abomistar/edit.html.twig', [
            'abomistar' => $abomistar,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_abomistar_delete', methods: ['POST'])]
    public function delete(Request $request, Abomistar $abomistar, AbomistarRepository $abomistarRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$abomistar->getId(), $request->request->get('_token'))) {
            $abomistarRepository->remove($abomistar, true);
        }

        return $this->redirectToRoute('app_abomistar_index', [], Response::HTTP_SEE_OTHER);
    }
}
