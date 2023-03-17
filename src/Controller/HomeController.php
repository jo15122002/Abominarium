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
        $abomistars = [
            [
                'name' => 'Acidling',
                'id' => 1,
                'imageUrl' => 'https://url.png',
                'size' => 0.5,
                'weight' => 10,
                'capacities' => [
                    [
                        'id' => 1,
                        'name' => 'Acid Spray',
                        'description' => 'Sprays acid on enemies',
                        'abomistars' => []
                    ],
                    [
                        'id' => 2,
                        'name' => 'Poison Touch',
                        'description' => 'Poisons enemies upon touch',
                        'abomistars' => []
                    ]
                ],
                'types' => [
                    [
                        'id' => 1,
                        'name' => 'Poison',
                        'abomistars' => [],
                        'strengths' => [
                            [
                                'id' => 2,
                                'name' => 'Grass',
                                'abomistars' => [],
                                'strengths' => [],
                                'weaknesses' => []
                            ]
                        ],
                        'weaknesses' => [
                            [
                                'id' => 3,
                                'name' => 'Steel',
                                'abomistars' => [],
                                'strengths' => [],
                                'weaknesses' => []
                            ]
                        ]
                    ]
                ],
                'habitat' => [
                    'id' => 1,
                    'name' => 'Swamp',
                    'description' => 'A murky swamp',
                    'anecdotes' => [
                        'Many Acidlings live in the swamp',
                        'The swamp is full of dangerous creatures'
                    ],
                    'inhabitants' => []
                ],
                'anecdotes' => [
                    'Acidlings are known for their ability to spray acid',
                    'They are often found in swamps'
                ],
                'alimentation' => 'Insects',
                'previousEvolution' => null,
                'nextEvolution' => null
            ],
            [
                'name' => 'Acidling',
                'id' => 2,
                'imageUrl' => 'https://url.png',
                'size' => 0.5,
                'weight' => 10,
                'capacities' => [
                    [
                        'id' => 1,
                        'name' => 'Acid Spray',
                        'description' => 'Sprays acid on enemies',
                        'abomistars' => []
                    ],
                    [
                        'id' => 2,
                        'name' => 'Poison Touch',
                        'description' => 'Poisons enemies upon touch',
                        'abomistars' => []
                    ]
                ],
                'types' => [
                    [
                        'id' => 1,
                        'name' => 'Poison',
                        'abomistars' => [],
                        'strengths' => [
                            [
                                'id' => 2,
                                'name' => 'Grass',
                                'abomistars' => [],
                                'strengths' => [],
                                'weaknesses' => []
                            ]
                        ],
                        'weaknesses' => [
                            [
                                'id' => 3,
                                'name' => 'Steel',
                                'abomistars' => [],
                                'strengths' => [],
                                'weaknesses' => []
                            ]
                        ]
                    ]
                ],
                'habitat' => [
                    'id' => 1,
                    'name' => 'Swamp',
                    'description' => 'A murky swamp',
                    'anecdotes' => [
                        'Many Acidlings live in the swamp',
                        'The swamp is full of dangerous creatures'
                    ],
                    'inhabitants' => []
                ],
                'anecdotes' => [
                    'Acidlings are known for their ability to spray acid',
                    'They are often found in swamps'
                ],
                'alimentation' => 'Insects',
                'previousEvolution' => null,
                'nextEvolution' => null
            ],
            [
                'name' => 'Acidling',
                'id' => 3,
                'imageUrl' => 'https://url.png',
                'size' => 0.5,
                'weight' => 10,
                'capacities' => [
                    [
                        'id' => 1,
                        'name' => 'Acid Spray',
                        'description' => 'Sprays acid on enemies',
                        'abomistars' => []
                    ],
                    [
                        'id' => 2,
                        'name' => 'Poison Touch',
                        'description' => 'Poisons enemies upon touch',
                        'abomistars' => []
                    ]
                ],
                'types' => [
                    [
                        'id' => 1,
                        'name' => 'Poison',
                        'abomistars' => [],
                        'strengths' => [
                            [
                                'id' => 2,
                                'name' => 'Grass',
                                'abomistars' => [],
                                'strengths' => [],
                                'weaknesses' => []
                            ]
                        ],
                        'weaknesses' => [
                            [
                                'id' => 3,
                                'name' => 'Steel',
                                'abomistars' => [],
                                'strengths' => [],
                                'weaknesses' => []
                            ]
                        ]
                    ]
                ],
                'habitat' => [
                    'id' => 1,
                    'name' => 'Swamp',
                    'description' => 'A murky swamp',
                    'anecdotes' => [
                        'Many Acidlings live in the swamp',
                        'The swamp is full of dangerous creatures'
                    ],
                    'inhabitants' => []
                ],
                'anecdotes' => [
                    'Acidlings are known for their ability to spray acid',
                    'They are often found in swamps'
                ],
                'alimentation' => 'Insects',
                'previousEvolution' => null,
                'nextEvolution' => null
            ],
            [
                'name' => 'Acidling',
                'id' => 4,
                'imageUrl' => 'https://url.png',
                'size' => 0.5,
                'weight' => 10,
                'capacities' => [
                    [
                        'id' => 1,
                        'name' => 'Acid Spray',
                        'description' => 'Sprays acid on enemies',
                        'abomistars' => []
                    ],
                    [
                        'id' => 2,
                        'name' => 'Poison Touch',
                        'description' => 'Poisons enemies upon touch',
                        'abomistars' => []
                    ]
                ],
                'types' => [
                    [
                        'id' => 1,
                        'name' => 'Poison',
                        'abomistars' => [],
                        'strengths' => [
                            [
                                'id' => 2,
                                'name' => 'Grass',
                                'abomistars' => [],
                                'strengths' => [],
                                'weaknesses' => []
                            ]
                        ],
                        'weaknesses' => [
                            [
                                'id' => 3,
                                'name' => 'Steel',
                                'abomistars' => [],
                                'strengths' => [],
                                'weaknesses' => []
                            ]
                        ]
                    ]
                ],
                'habitat' => [
                    'id' => 1,
                    'name' => 'Swamp',
                    'description' => 'A murky swamp',
                    'anecdotes' => [
                        'Many Acidlings live in the swamp',
                        'The swamp is full of dangerous creatures'
                    ],
                    'inhabitants' => []
                ],
                'anecdotes' => [
                    'Acidlings are known for their ability to spray acid',
                    'They are often found in swamps'
                ],
                'alimentation' => 'Insects',
                'previousEvolution' => null,
                'nextEvolution' => null
            ]
        ];

        $abomistarsPerPage = 22;

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
