<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Chef;


class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $chef = new Chef();
        $chef->setNom('Baruch');
        $chef->setPrenom('Emmanuel');
        $chef->setPresentation('presentation');
        $chef->setTypeDeCuisine('Asiatique');
        $chef->setMenu('menu 1');
        $chef->setImage('cooking-890885_1920.jpg');

        $chef2 = new Chef();
        $chef2->setNom('Dupont');
        $chef2->setPrenom('Henry');
        $chef2->setPresentation('presentation');
        $chef2->setTypeDeCuisine('Francaise');
        $chef2->setMenu('menu 1');
        $chef2->setImage('chef-cuisinier2.jpg');

        $chef3 = new Chef();
        $chef3->setNom('Sanchez');
        $chef3->setPrenom('Camelia');
        $chef3->setPresentation('presentation');
        $chef3->setTypeDeCuisine('Mexicaine');
        $chef3->setMenu('menu 1');
        $chef3->setImage('chef-cuisinier3.jpg');

        $chef4 = new Chef();
        $chef4->setNom('Luciano');
        $chef4->setPrenom('Luis');
        $chef4->setPresentation('presentation');
        $chef4->setTypeDeCuisine('Italienne');
        $chef4->setMenu('menu 1');
        $chef4->setImage('chef-cuisinier4.jpg');

        $chef5 = new Chef();
        $chef5->setNom('Badah');
        $chef5->setPrenom('Gilles');
        $chef5->setPresentation('presentation');
        $chef5->setTypeDeCuisine('Végétarien');
        $chef5->setMenu('menu 1');
        $chef5->setImage('chef-cuisinier5.jpg');

        $chef6 = new Chef();
        $chef6->setNom('Monty');
        $chef6->setPrenom('Prisca');
        $chef6->setPresentation('presentation');
        $chef6->setTypeDeCuisine('Afrique');
        $chef6->setMenu('menu 1');
        $chef6->setImage('chef-cuisinier6.jpg');

        
        $manager->persist($chef);
        $manager->persist($chef2);
        $manager->persist($chef3);
        $manager->persist($chef4);
        $manager->persist($chef5);
        $manager->persist($chef6);
        $manager->flush();
    }
}
