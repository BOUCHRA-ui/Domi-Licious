<?php

namespace App\DataFixtures;

use App\Entity\Menu;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $menu = new Menu();
        $menu->setEntree('entree');
        $menu->setPlat('plat');
        $menu->setDessert('dessert');






        $manager->flush();
    }
}
