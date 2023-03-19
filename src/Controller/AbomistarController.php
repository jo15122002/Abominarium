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

    #[Route('/{id}', name: 'app_abomistar_show', methods: ['GET'])]
    public function show(string $id, Request $request): Response
    {
        $aboList = $this->abomistarRepository->findAll();
        if($id < $aboList[0]->getId()){
            $id = $aboList[0]->getId();
        }else if($id > $aboList[count($aboList)-1]->getId()){
            $id = $aboList[count($aboList)-1]->getId();
        }
        $abomistar = $this->abomistarRepository->findBy(['id' => $id])[0];
        // tant que l'abomistar n'a pas d'évolution, on incremente une variable pour savoir combien de fois on a fait ça pour avoir le level d'évolution de l'abomistar
        $evolutionLevel = 0;
        while($abomistar->getPreviousEvolution() != null){
            $evolutionLevel++;
            $abomistar = $this->abomistarRepository->findBy(['id' => $abomistar->getPreviousEvolution()->getId()])[0];
        }
        $abomistarsPerPage = 22;

        $abomistars = $this->abomistarRepository->findAll();
        $page = $request->query->getInt('page', 1);
        $offset = ($page - 1) * $abomistarsPerPage;
        $currentPageAbomistars = array_slice($abomistars, $offset, $abomistarsPerPage);

        return $this->render('abomistar/show.html.twig', [
            'abomistar' => $this->abomistarRepository->findBy(['id' => $id])[0],
            'evolutionLevel' => $evolutionLevel,
            'currentPageAbomistars' => $currentPageAbomistars,
            'currentPage' => $page,
            'totalPages' => ceil(count($abomistars) / $abomistarsPerPage),
        ]);
    }
}
