<?php

namespace App\Controller;
use App\Repository\AbomistarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_home_')]
class HomeController extends AbstractController
{
    public function __construct(
        AbomistarRepository $abomistarRepository
    )
    {
        $this->abomistarRepository = $abomistarRepository;
    }

    #[Route('', name: 'index')]
    public function index(Request $request): Response
    {
        $abomistarsPerPage = 22;

        $abomistars = $this->abomistarRepository->findAll();
        $page = $request->query->getInt('page', 1);
        $offset = ($page - 1) * $abomistarsPerPage;
        $currentPageAbomistars = array_slice($abomistars, $offset, $abomistarsPerPage);

        return $this->render('home/index.html.twig', [
            'currentPageAbomistars' => $currentPageAbomistars,
            'currentPage' => $page,
            'totalPages' => ceil(count($abomistars) / $abomistarsPerPage),
        ]);
    }
}
