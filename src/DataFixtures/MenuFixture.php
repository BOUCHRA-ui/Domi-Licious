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

            $typeCuisine = $this->getReference('type-cuisine');

            

    
            $menu = new Menu();
            $menu->setEntree('Salade de concombre sur son lit d\'Ananas');
            $menu->setPlat('Duo de saumon sur son tartare de boeuf');
            $menu->setDessert('Crêpe de Nutella');
            $menu->setImage('s1.jpg');
            $menu->setTypeCuisine($typeCuisine);
            $menu->setChef($chef);
            $menu->setPrice(200);

            $manager->persist($menu);

            $menu2 = new Menu();
            $menu2->setEntree('Nems aux crevettes');
            $menu2->setPlat('Spagettis bolognaise');
            $menu2->setDessert('Glaces');
            $menu2->setImage('s2.jpg');
            $menu2->setTypeCuisine($typeCuisine);
            $menu2->setChef($chef);
            $menu2->setPrice(200);

            $manager->persist($menu);

            $menu3 = new Menu();
            $menu3->setEntree('huitres');
            $menu3->setPlat('suamon au riz');
            $menu3->setDessert('cremme brulée');
            $menu3->setImage('s3.jpg');
            $menu3->setTypeCuisine($typeCuisine);
            $menu3->setChef($chef);
            $menu3->setPrice(200);

            $manager->persist($menu);

            $menu4 = new Menu();
            $menu4->setEntree('salade de tomate et mozzarella');
            $menu4->setPlat('chou farci au crevette');
            $menu4->setDessert('foret noir');
            $menu4->setImage('s4.jpg');
            $menu4->setTypeCuisine($typeCuisine);
            $menu4->setChef($chef);
            $menu4->setPrice(200);

            $manager->persist($menu);

            $menu5 = new Menu();
            $menu5->setEntree('tapas');
            $menu5->setPlat('pizza 4 fromage');
            $menu5->setDessert('tarte au myrtille');
            $menu5->setImage('s5.jpg');
            $menu5->setTypeCuisine($typeCuisine);
            $menu5->setChef($chef);
            $menu5->setPrice(200);

            $manager->persist($menu);

            $menu6 = new Menu();
            $menu6->setEntree('bacon au melon');
            $menu6->setPlat('poulet roti');
            $menu6->setDessert('tiramisu');
            $menu6->setImage('s6.jpg');
            $menu6->setTypeCuisine($typeCuisine);
            $menu6->setChef($chef);
            $menu6->setPrice(200);

            $manager->persist($menu);
     

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
