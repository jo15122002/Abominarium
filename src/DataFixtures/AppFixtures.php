<?php

namespace App\DataFixtures;

use App\Entity\Abomistar;
use App\Entity\AbomistarType;
use App\Entity\Capacity;
use App\Entity\Habitat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $abomistars = [
            [
                "nom" => "Icelurk",
                "type" => "Glace",
                "description" => "Un abomistar de type Glace ressemblant à un golem de neige géant. Il peut projeter des boules de neige glacée sur ses ennemis et créer des tempêtes de neige pour les désorienter.",
                "image" => "icelurk.jpg",
                "taille" => "2.5",
                "poids" => "500",
                "alimentation" => "Herbes et baies gelées",
                "habitat" => "Toundra",
                "evolution_precedente" => null,
                "evolution_suivante" => "Glaciopod"
            ],
            [
                "nom" => "Glaciopod",
                "type" => "Glace",
                "description" => "Une évolution de l'Icelurk qui a développé des pattes pour se déplacer plus rapidement sur la glace. Il peut créer des pics de glace et des lames acérées pour attaquer ses ennemis.",
                "image" => "glaciopod.jpg",
                "taille" => "3",
                "poids" => "800",
                "alimentation" => "Herbes et baies gelées",
                "habitat" => "Montagne",
                "evolution_precedente" => "Icelurk",
                "evolution_suivante" => "Frostbite"
            ],
            [
                "nom" => "Frostbite",
                "type" => "Glace",
                "description" => "La forme ultime de l'Icelurk, avec un corps massif et des pics de glace géants qui dépassent de son dos. Il peut créer des tempêtes de neige et des blizzards pour congeler ses ennemis sur place.",
                "image" => "frostbite.jpg",
                "taille" => "4",
                "poids" => "1200",
                "alimentation" => "Herbes et baies gelées",
                "habitat" => "Toundra",
                "evolution_precedente" => "Glaciopod",
                "evolution_suivante" => null
            ],
            [
                "nom" => "Klowala",
                "type" => "Eau",
                "description" => "Un abomistar de type Eau ressemblant à un koala mouillé déguisé en clown flippant. Il peut projeter des jets d'eau sur ses ennemis pour les désorienter.",
                "image" => "klowala.jpg",
                "taille" => "1.5",
                "poids" => "200",
                "alimentation" => "Eucalyptus et algues marines",
                "habitat" => "Forêt",
                "evolution_precedente" => null,
                "evolution_suivante" => null
            ],
            [
                "nom" => "Garoulame",
                "type" => "Ténèbres",
                "description" => "Une évolution du Klownite qui a développé un pelage sombre pour se camoufler dans les ombres. Il peut lancer des attaques de type Ténèbres et piéger ses ennemis dans des illusions.",
                "image" => "garoulame.jpg",
                "taille" => "3",
                "poids" => "600",
                "alimentation" => "Viande rouge et noix",
                "habitat" => "Souterrain",
                "evolution_precedente" => null,
                "evolution_suivante" => "Garoulupine"
            ],
            [
                "nom" => "Garoulupine",
                "type" => "Ténèbres",
                "description" => "La forme ultime du Klowala, avec un pelage sombre et des crocs acérés. Il peut lancer des attaques de type Ténèbres et de type Combat et utiliser son agilité pour esquiver les attaques ennemies.",
                "image" => "garoulupine.jpg",
                "taille" => "4",
                "poids" => "1000",
                "alimentation" => "Viande rouge et noix",
                "habitat" => "Forêt",
                "evolution_precedente" => "Garoulame",
                "evolution_suivante" => null
            ],
            [
                "nom" => "Toximaw",
                "type" => "Poison",
                "description" => "Un abomistar de type Poison ressemblant à un crocodile à l'allure menaçante. Il peut injecter un poison mortel à travers ses crocs et utiliser son corps musclé pour asséner des coups puissants.",
                "image" => "toximaw.jpg",
                "taille" => "2",
                "poids" => "300",
                "alimentation" => "Viande crue et charognes",
                "habitat" => "Marais",
                "evolution_precedente" => null,
                "evolution_suivante" => "Toxiclaw"
            ],
            [
                "nom" => "Toxiclaw",
                "type" => "Poison/Combat",
                "description" => "Une évolution du Toximaw qui a développé une force phénoménale pour écraser ses ennemis. Il peut injecter un poison mortel à travers ses crocs acérés et utiliser ses griffes puissantes pour lacérer les ennemis.",
                "image" => "toxiclaw.jpg",
                "taille" => "2.5",
                "poids" => "500",
                "alimentation" => "Viande crue et charognes",
                "habitat" => "Forêt",
                "evolution_precedente" => "Toximaw",
                "evolution_suivante" => "Venodoom"
            ],
            [
                "nom" => "Venodoom",
                "type" => "Poison/Combat",
                "description" => "La forme ultime du Toximaw, avec un corps massif et des crocs venimeux géants. Il peut utiliser son agilité pour éviter les attaques ennemies et lacérer ses ennemis avec ses griffes acérées.",
                "image" => "venodoom.jpg",
                "taille" => "3",
                "poids" => "800",
                "alimentation" => "Viande crue et charognes",
                "habitat" => "Forêt",
                "evolution_precedente" => "Toxiclaw",
                "evolution_suivante" => null
            ]
        ];

        $types = [
            "Normal" => ["Faiblesse" => ["Combat"], "Résistance" => ["Spectre"]],
            "Feu" => ["Faiblesse" => ["Eau", "Sol", "Roche"], "Résistance" => ["Feu", "Herbe", "Glace", "Insecte", "Acier"]],
            "Eau" => ["Faiblesse" => ["Electrique", "Herbe"], "Résistance" => ["Eau", "Feu", "Glace", "Acier"]],
            "Herbe" => ["Faiblesse" => ["Feu", "Vol", "Glace", "Poison", "Insecte"], "Résistance" => ["Eau", "Herbe", "Electrique", "Sol"]],
            "Electrique" => ["Faiblesse" => ["Sol"], "Résistance" => ["Electrique", "Vol", "Acier"]],
            "Sol" => ["Faiblesse" => ["Eau", "Herbe", "Glace"], "Résistance" => ["Poison", "Roche"], "Immunite" => ["Electrique"]],
            "Roche" => ["Faiblesse" => ["Eau", "Herbe", "Combat", "Sol", "Acier"], "Résistance" => ["Feu", "Vol", "Normal", "Poison"]],
            "Combat" => ["Faiblesse" => ["Vol", "Psychique", "Fée"], "Résistance" => ["Insecte", "Roche", "Ténèbres"]],
            "Vol" => ["Faiblesse" => ["Electrique", "Glace", "Roche"], "Résistance" => ["Combat", "Insecte", "Plante"]],
            "Poison" => ["Faiblesse" => ["Sol", "Psychique"], "Résistance" => ["Combat", "Insecte", "Plante", "Poison", "Fée"]],
            "Psy" => ["Faiblesse" => ["Insecte", "Spectre", "Ténèbres"], "Résistance" => ["Combat", "Psy"]],
            "Insecte" => ["Faiblesse" => ["Feu", "Vol", "Roche"], "Résistance" => ["Combat", "Herbe", "Sol"]],
            "Spectre" => ["Faiblesse" => ["Ténèbres", "Spectre"], "Résistance" => ["Poison", "Insecte"]],
            "Dragon" => ["Faiblesse" => ["Glace", "Fée", "Dragon"], "Résistance" => ["Feu", "Eau", "Herbe", "Electrique"]],
            "Ténèbres" => ["Faiblesse" => ["Combat", "Insecte", "Fée"], "Résistance" => ["Spectre", "Ténèbres"], "Immunite" => ["Psy"]],
            "Acier" => ["Faiblesse" => ["Feu", "Combat", "Sol"], "Résistance" => ["Normal", "Herbe", "Glace", "Vol", "Poison", "Roche", "Insecte", "Acier", "Psy", "Dragon","Fée"]],
            "Glace" => ["Faiblesse" => ["Combat", "Feu", "Roche", "Acier"], "Résistance" => ["Glace", "Eau"]],
            "Psychique" => ["Faiblesse" => ["Ténèbres", "Spectre", "Insecte"], "Résistance" => ["Combat", "Psy"]],
            "Fée" => ["Faiblesse" => ["Acier", "Poison"], "Résistance" => ["Combat", "Ténèbres", "Insecte"]],
            "Plante" => ["Faiblesse" => ["Feu", "Glace", "Poison", "Vol", "Insecte"], "Résistance" => ["Eau", "Plante", "Sol"]]
        ];

        $habitats = [
            "Forêt" => "Un habitat luxuriant et dense, peuplé d'arbres et de plantes.",
            "Montagne" => "Un habitat escarpé et rocheux, où seuls les Abomistars les plus résistants survivent.",
            "Plaine" => "Un habitat vaste et ouvert, avec des herbes hautes et une variété d'animaux sauvages.",
            "Mer" => "Un habitat sous-marin riche en vie marine et en ressources naturelles.",
            "Grotte" => "Un habitat sombre et rocheux, rempli de stalactites et de stalagmites.",
            "Désert" => "Un habitat aride et sec, avec peu de végétation et des températures extrêmes.",
            "Ciel" => "Un habitat aérien, où les Abomistars volants dominent les cieux.",
            "Toundra" => "Un habitat glacé et inhospitalier, où seuls les Abomistars les plus résistants peuvent survivre.",
            "Marais" => "Un habitat humide et boueux, avec des plantes aquatiques et une variété d'animaux amphibies.",
            "Îles" => "Un habitat isolé et diversifié, composé d'une variété d'îles avec leur propre écosystème unique.",
            "Ville" => "Un habitat artificiel, où les Abomistars peuvent vivre aux côtés des humains et s'adapter à la vie urbaine.",
            "Souterrain" => "Un habitat souterrain, rempli de cavernes et de tunnels.",
            "Ruines" => "Un habitat ancien et mystique, où les Abomistars peuvent être trouvés dans des ruines antiques.",
            "Volcan" => "Un habitat dangereux et hostile, situé près d'un volcan actif.",
            "Espace" => "Un habitat extraterrestre, avec des environnements étranges et des Abomistars cosmiques."
        ];

        $attaques = array(
            "Icelurk" => array(
                "Rayon glacé" => "L'Abomistar projette un rayon glacé sur son adversaire, infligeant des dégâts et le gelant.",
                "Bouclier de glace" => "L'Abomistar se protège avec un bouclier de glace, augmentant sa défense et diminuant les dégâts qu'il reçoit.",
                "Griffes de glace" => "L'Abomistar frappe son adversaire avec des griffes de glace, infligeant des dégâts et le gelant."
            ),
            "Glaciopod" => array(
                "Frappe glacée" => "L'Abomistar frappe son adversaire avec un poing glacé, infligeant des dégâts et le gelant.",
                "Glissade" => "L'Abomistar glisse sur la glace, augmentant sa vitesse et diminuant les dégâts qu'il reçoit.",
                "Coup de tête" => "L'Abomistar donne un coup de tête puissant à son adversaire, infligeant des dégâts et le projetant en arrière."
            ),
            "Frostbite" => array(
                "Morsure glacée" => "L'Abomistar mord son adversaire avec des crocs glacés, infligeant des dégâts et le gelant.",
                "Regard glacial" => "L'Abomistar fixe son adversaire du regard, diminuant sa vitesse et le gelant.",
                "Patinage artistique" => "L'Abomistar exécute une danse sur glace, augmentant sa défense et intimidant son adversaire."
            ),
            "Klowala" => array(
                "Attaque en piqué" => "L'Abomistar plonge sur son adversaire en piqué, infligeant des dégâts et le projetant au sol.",
                "Boule de poil" => "L'Abomistar lance une boule de poil sur son adversaire, infligeant des dégâts et le rendant confus.",
                "Sourire narquois" => "L'Abomistar sourit narquoisement à son adversaire, diminuant son attaque et augmentant la sienne."
            ),
            "Garoulame" => array(
                "Crocs acérés" => "L'Abomistar mord son adversaire avec des crocs acérés, infligeant des dégâts et le rendant saigné.",
                "Danse de la lune" => "L'Abomistar danse sous la lune, augmentant sa vitesse et diminuant les dégâts qu'il reçoit.",
                "Rugissement lunaire" => "L'Abomistar rugit à la lune, augmentant sa défense et intimidant son adversaire."
            ),
            "Garoulupine" => array(
                "Coup de griffe empoisonné" => "L'Abomistar frappe son adversaire avec une griffe empoisonnée, infligeant des dégâts et le rendant empoisonné.",
                "Toile toxique" => "L'Abomistar tisse une toile toxique autour de son adversaire, diminuant sa vitesse et le rendant empoisonné.",
                "Rage nocturne" => "L'Abomistar se met en colère sous la lueur de la lune, augmentant son attaque et diminuant sa défense."
            ),
            "Toximaw" => array(
                "Morsure toxique" => "L'Abomistar mord son adversaire avec des crocs toxiques, infligeant des dégâts et le rendant empoisonné.",
                "Lacération" => "L'Abomistar lacère son adversaire avec ses griffes acérées, infligeant des dégâts et le saignant.",
                "Venin fatal" => "L'Abomistar injecte un venin mortel dans son adversaire, infligeant des dégâts et le rendant empoisonné gravement."
            ),
            "Toxiclaw" => array(
                "Griffe empoisonnée" => "L'Abomistar frappe son adversaire avec une griffe empoisonnée, infligeant des dégâts et le rendant empoisonné.",
                "Danse du venin" => "L'Abomistar exécute une danse envoûtante, diminuant la défense de son adversaire et le rendant empoisonné.",
                "Poison paralysant" => "L'Abomistar injecte un poison paralysant dans son adversaire, infligeant des dégâts et le paralysant."
            ),
            "Venodoom" => array(
                "Pistolet à venin" => "L'Abomistar projette un jet de venin sur son adversaire, infligeant des dégâts et le rendant empoisonné.",
                "Choc toxique" => "L'Abomistar frappe son adversaire avec une attaque chargée de poison, infligeant des dégâts et le rendant empoisonné gravement.",
                "Nuage de poison" => "L'Abomistar crée un nuage de poison toxique autour de son adversaire, diminuant sa défense et le rendant empoisonné."
            )
        );



        $this->loadTypes($manager, $types);
        $this->loadHabitats($manager, $habitats);
        $this->loadAbomistars($manager, $abomistars);
        $this->loadAttaques($manager, $attaques);
    }

    private function loadTypes(ObjectManager $manager, array $types): void
    {
        //Load de tous les types dans la bdd
        foreach ($types as $type => $properties) {
            $typeObject = new AbomistarType();
            $typeObject->setName($type);
            $manager->persist($typeObject);
        }

        $manager->flush();

        //Load des différentes forces et faiblesses entre les types
        foreach ($types as $type => $properties){
            $typeObject = $manager->getRepository(AbomistarType::class)->findOneBy(['name' => $type]);
            foreach ($properties as $property => $values){
                $weaknessses = new ArrayCollection();
                $strengths = new ArrayCollection();
                foreach ($values as $value){
                    $value = $manager->getRepository(AbomistarType::class)->findOneBy(['name' => $value]);
                    if ($property === "Faiblesse"){
                        $weaknessses->add($value);
                    } elseif ($property === "Résistance"){
                        $strengths->add($value);
                    }
                }
                $typeObject->setWeaknesses($weaknessses);
                $typeObject->setStrengths($strengths);
            }
        }
        $manager->flush();
    }

    private function loadHabitats(ObjectManager $manager, array $habitats): void
    {
        foreach ($habitats as $habitat => $description) {
            $habitatObject = new Habitat();
            $habitatObject->setName($habitat);
            $habitatObject->setDescription($description);
            $manager->persist($habitatObject);
        }
        $manager->flush();
    }

    private function loadAbomistars(ObjectManager $manager, array $abomistars): void
    {
        foreach ($abomistars as $abomistar) {
            $abomistarObject = new Abomistar();
            $abomistarObject->setName($abomistar['nom']);
            if(str_contains($abomistar['type'], "/")){
                $types = explode("/", $abomistar['type']);
                foreach ($types as $type){
                    $abomistarObject->addType($manager->getRepository(AbomistarType::class)->findOneBy(['name' => $type]));
                }
            }else{
                $abomistarObject->addType($manager->getRepository(AbomistarType::class)->findOneBy(['name' => $abomistar['type']]));
            }
            $abomistarObject->setAnecdotes([$abomistar['description']]);
            $abomistarObject->setImageUrl($abomistar['image']);
            $abomistarObject->setSize((float)$abomistar['taille']);
            $abomistarObject->setWeight((float)$abomistar['poids']);
            $abomistarObject->setAlimentation($abomistar['alimentation']);
            $abomistarObject->setHabitat($manager->getRepository(Habitat::class)->findOneBy(['name' => $abomistar['habitat']]));

            $manager->persist($abomistarObject);
        }

        $manager->flush();

        foreach ($abomistars as $abomistar){
            $abomistarObject = $manager->getRepository(Abomistar::class)->findOneBy(['name' => $abomistar['nom']]);

            if(!empty($abomistar['evolution_suivante'])){
                //on prend que la prochaine évolution et pas toute la liste
                $abomistarObject->setNextEvolution($manager->getRepository(Abomistar::class)->findOneBy(['name' => $abomistar['evolution_suivante']]));
            }

            if(!empty($abomistar['evolution_precedente'])){
                //on prend que l'évolution précédente et pas toute la liste
                $abomistarObject->setPreviousEvolution($manager->getRepository(Abomistar::class)->findOneBy(['name' => $abomistar['evolution_precedente']]));
            }

            $manager->persist($abomistarObject);
        }
        $manager->flush();
    }

    private function loadAttaques(ObjectManager $manager, array $attaques): void
    {
        foreach ($attaques as $abomistar => $attaque){
            foreach ($attaque as $name => $description){
                $attaqueObject = new Capacity();
                $attaqueObject->setName($name);
                $attaqueObject->setDescription($description);
                $manager->persist($attaqueObject);
            }
        }

        $manager->flush();

        foreach ($attaques as $abomistar => $attaque){
            $abomistarObject = $manager->getRepository(Abomistar::class)->findOneBy(['name' => $abomistar]);
            foreach ($attaque as $name => $description){
                $attaqueObject = $manager->getRepository(Capacity::class)->findOneBy(['name' => $name]);
                $abomistarObject->addCapacity($attaqueObject);
            }
            $manager->persist($abomistarObject);
        }

        $manager->flush();
    }
}
