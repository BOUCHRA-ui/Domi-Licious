<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Chef;
use App\Entity\Menu;
use App\Entity\TypeCuisine;

class MenuFixture extends Fixture implements DependentFixtureInterface
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }        

    public function load(ObjectManager $manager)
    {
            $chef = $this->getReference('chef');
            $chef2 = $this->getReference('chef2');
            $chef3 = $this->getReference('chef3');
            $chef4 = $this->getReference('chef4');
            $chef5 = $this->getReference('chef5');
            $chef6 = $this->getReference('chef6');
      
            $typeCuisine = $this->getReference('type-orientale');
            $typeCuisine2 = $this->getReference('type-japonais');
            $typeCuisine3 = $this->getReference('type-asiatique');
            $typeCuisine4 = $this->getReference('type-francais');
            $typeCuisine5 = $this->getReference('type-italien');
            $typeCuisine6 = $this->getReference('type-mexicain');

           
            $menu = new Menu();
            $menu->setEntree('Carpaccio de boeuf sur fond de roquette OU Foie gras aux poires et aux marrons ');
            $menu->setPlat('Cuissot de coq au vin pomme noisettes OU Magret en croute et légumes oubliés');
            $menu->setDessert('Tatin de quetsches glace cannelle  OU Pavlova aux fraises des bois');
            $menu->setImage('france.jpg');
            $menu->setTypeCuisine($typeCuisine4);
            $menu->setChef($chef);
            $menu->setPrice(200);

            $manager->persist($menu);

            $menu2 = new Menu();
            $menu2->setEntree('Salade mexicaine OU Fajitas de camarone');
            $menu2->setPlat('Carne et velouté de patates douces OU Poisons grillé et petits légumes');
            $menu2->setDessert('Bananes flambées au téquila OU Cake aux cerise');
            $menu2->setImage('mex.jpg');
            $menu2->setTypeCuisine($typeCuisine6);
            $menu2->setChef($chef6);
            $menu2->setPrice(200);

            $manager->persist($menu2);

            $menu3 = new Menu();
            $menu3->setEntree('Zaalouk OU Salade marocaine');
            $menu3->setPlat('Pastilla au poulet et aux amandes OU  Tajine Berbère');
            $menu3->setDessert('Pavlova orange aux dates OU Ananas frais chantilly aux épices');
            $menu3->setImage('oriafri.jpg');
            $menu3->setTypeCuisine($typeCuisine);
            $menu3->setChef($chef5);
            $menu3->setPrice(200);

            $manager->persist($menu3);

            $menu4 = new Menu();
            $menu4->setEntree('Antipasti OU Bresoala');
            $menu4->setPlat('Risotto aux St-Jaques OU Tagliata di manzo');
            $menu4->setDessert('Tiramisu aux Framboises OU Café Goloso ');
            $menu4->setImage('ital.jpg');
            $menu4->setTypeCuisine($typeCuisine5);
            $menu4->setChef($chef4);
            $menu4->setPrice(200);

            $manager->persist($menu4);

            $menu5 = new Menu();
            $menu5->setEntree('Champignons enoki sautés au gingembre et à la carotte');
            $menu5->setPlat('Teriyaki de saumon');
            $menu5->setDessert('Kakigori, la glace pilée japonaise');
            $menu5->setImage('vege.jpg');
            $menu5->setTypeCuisine($typeCuisine2);
            $menu5->setChef($chef2);
            $menu5->setPrice(200);

            $manager->persist($menu5);

            $menu6 = new Menu();
            $menu6->setEntree('Soupe aux légumes et matcha OU Croustillants saumon et fruit secs');
            $menu6->setPlat('Grillades poison et légumes saison OU Wagyu Shigure Don');
            $menu6->setDessert('Eppure aux fruits OU Mousse au thé matcha');
            $menu6->setImage('asi.jpg');
            $menu6->setTypeCuisine($typeCuisine3);
            $menu6->setChef($chef3);
            $menu6->setPrice(200);

            $manager->persist($menu6);     

         $manager->flush();

         $this->addReference('menu', $menu);
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return class-string[]
     */
    public function getDependencies()
    {
        return array(
            ChefFixture::class,
            TypeCuisineFixture::class,
        );
    }
}
