<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Chef;
use App\Entity\Menu;


class ChefFixture extends Fixture
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }        

    public function load(ObjectManager $manager)
    {
        $menu = new Menu();
        $menu2 = new Menu();
        $menu3 = new Menu();
        $menu4 = new Menu();
        $menu5 = new Menu();
        $menu6 = new Menu();
        $chef = new Chef();
        $chef2 = new Chef();
        $chef3 = new Chef();
        $chef4 = new Chef();
        $chef5 = new Chef();
        $chef6 = new Chef();

        
        $chef = new Chef();
        $chef->setNom('Baruch');
        $chef->setPrenom('Emmanuel');
        $chef->setPresentation('presentation');
        $chef->setTypeCuisine('Asiatique');
        $chef->setMenu($menu);
        $chef->setImage('chef-cuisinier.jpg');

        $manager->persist($chef);

        $chef2 = new Chef();
        $chef2->setNom('Dupont');
        $chef2->setPrenom('Henry');
        $chef2->setPresentation('presentation');
        $chef2->setTypeCuisine('Francaise');
        $chef2->setMenu('menu 1');
        $chef2->setImage('chef-cuisinier2.jpg');

        $manager->persist($chef2);

        $chef3 = new Chef();
        $chef3->setNom('Sanchez');
        $chef3->setPrenom('Camelia');
        $chef3->setPresentation('presentation');
        $chef3->setTypeCuisine('Mexicaine');
        $chef3->setMenu($menu2);
        $chef3->setImage('chef-cuisinier3.jpg');

        $manager->persist($chef3);

        $chef4 = new Chef();
        $chef4->setNom('Luciano');
        $chef4->setPrenom('Luis');
        $chef4->setPresentation('presentation');
        $chef4->setTypeCuisine('Italienne');
        $chef4->setMenu($menu3);
        $chef4->setImage('chef-cuisinier4.jpg');

        $manager->persist($chef4);

        $chef5 = new Chef();
        $chef5->setNom('Badah');
        $chef5->setPrenom('Gilles');
        $chef5->setPresentation('presentation');
        $chef5->setTypeCuisine('Végétarien');
        $chef5->setMenu($menu4);
        $chef5->setImage('chef-cuisinier5.jpg');

        $manager->persist($chef5);

        $chef6 = new Chef();
        $chef6->setNom('Monty');
        $chef6->setPrenom('Prisca');
        $chef6->setPresentation('presentation');
        $chef6->setTypeCuisine('Afrique');
        $chef6->setMenu($menu6);
        $chef6->setImage('chef-cuisinier6.jpg');

        $manager->persist($chef);
        

         $manager->flush();
    
    }
    public function getDependencies()
    {
        return array(
            UserFixture::class,
        );
    }
}