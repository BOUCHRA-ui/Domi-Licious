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
            $menu->setEntree('Salade de Concombre sur son lit d\'Ananas');
            $menu->setPlat('Duo de saumon sur son tartare de boeuf');
            $menu->setDessert('Crêpe de Nutella');
            $menu->setImage('s1.jpg');
            $menu->setTypeCuisine($typeCuisine);
            $menu->setChef($chef);
            $menu->setPrice(200);

            $manager->persist($menu);

            $menu2 = new Menu();
            $menu2->setEntree('Nems au creevettes');
            $menu2->setPlat('Spagettis bolognaise');
            $menu2->setDessert('glaces');
            $menu2->setImage('s2.jpg');
            $menu2->setTypeCuisine($typeCuisine);
            $menu2->setChef($chef);
            $menu->setPrice(200);

            $manager->persist($menu);

            $menu = new Menu();
            $menu->setEntree('huitres');
            $menu->setPlat('suamon au riz');
            $menu->setDessert('cremme brulée');
            $menu->setImage('s3.jpg');
            $menu->setTypeCuisine($typeCuisine);
            $menu->setChef($chef);
            $menu->setPrice(200);

            $manager->persist($menu);

            $menu = new Menu();
            $menu->setEntree('salade de tomate et mozzarella');
            $menu->setPlat('chou farci au crevette');
            $menu->setDessert('foret noir');
            $menu->setImage('s4.jpg');
            $menu->setTypeCuisine($typeCuisine);
            $menu->setChef($chef);
            $menu->setPrice(200);

            $manager->persist($menu);

            $menu = new Menu();
            $menu->setEntree('tapas');
            $menu->setPlat('pizza 4 fromage');
            $menu->setDessert('tarte au myrtille');
            $menu->setImage('s5.jpg');
            $menu->setTypeCuisine($typeCuisine);
            $menu->setChef($chef);
            $menu->setPrice(200);

            $manager->persist($menu);

            $menu = new Menu();
            $menu->setEntree('bacon au melon');
            $menu->setPlat('poulet roti');
            $menu->setDessert('tiramisu');
            $menu->setImage('s6.jpg');
            $menu->setTypeCuisine($typeCuisine);
            $menu->setChef($chef);
            $menu->setPrice(200);

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
