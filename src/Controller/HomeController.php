<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_home_')]
class HomeController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(Request $request): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'abomistars' => [ // 22 par pages
                ['name' => 'Acidling'],
                ['name' => 'Blightwing'],
                ['name' => 'Chaosquito'],
                ['name' => 'Dreadhound'],
                ['name' => 'Frostbite'],
                ['name' => 'Gravetusk'],
                ['name' => 'Hellfire'],
                ['name' => 'Infernoid'],
                ['name' => 'Jinxweaver'],
                ['name' => 'Krakenshade'],
                ['name' => 'Lunabite'],
                ['name' => 'Magmaclaw'],
                ['name' => 'Necrofrost'],
                ['name' => 'Oozeblast'],
                ['name' => 'Plaguetail'],
                ['name' => 'Quicksand'],
                ['name' => 'Razorbeak'],
                ['name' => 'Shadowfang'],
                ['name' => 'Thunderstrike'],
                ['name' => 'Vampiric'],
                ['name' => 'Wraithwing'],
                ['name' => 'Xenogore']
            ]
        ]);
    }
}
