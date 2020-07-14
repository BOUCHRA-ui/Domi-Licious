<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\TypeCuisine;
use App\Entity\Chef;



class TypeCuisineFixture extends Fixture
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }        

    public function load(ObjectManager $manager)
    {
            $typeCuisine = new TypeCuisine();
            $typeCuisine->setTitle('Francaise');
            $typeCuisine->setDescription('description');
            $typeCuisine->setPhoto('s3.jpg');

            $manager->persist($typeCuisine);

            $typeCuisine2 = new TypeCuisine();
            $typeCuisine2->setTitle('Italienne');
            $typeCuisine2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine2->setPhoto('s2.jpg');

            $manager->persist($typeCuisine2);

            $typeCuisine3 = new TypeCuisine();
            $typeCuisine3->setTitle('Mexicaine');
            $typeCuisine3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine3->setPhoto('s4.jpg');

            $manager->persist($typeCuisine3);

            $typeCuisine4 = new TypeCuisine();
            $typeCuisine4->setTitle('Africaine');
            $typeCuisine4->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine4->setPhoto('s5.jpg');

            $manager->persist($typeCuisine4);

            $typeCuisine5 = new TypeCuisine();
            $typeCuisine5->setTitle('Asiatique');
            $typeCuisine5->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine5->setPhoto('s6.jpg');

            $manager->persist($typeCuisine5);

            $typeCuisine6 = new TypeCuisine();
            $typeCuisine6->setTitle('Végétarienne');
            $typeCuisine6->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine6->setPhoto('s7.jpg');

            $manager->persist($typeCuisine6);

      
         $manager->flush();

         $this->addReference('type-Francaise', $typeCuisine);
         $this->addReference('type-Italienne', $typeCuisine2);
         $this->addReference('type-Mexicainne', $typeCuisine3);
         $this->addReference('type-Africaine', $typeCuisine4);
         $this->addReference('type-Asiatique', $typeCuisine5);
         $this->addReference('type-Végétarienne', $typeCuisine6);

    }
}
