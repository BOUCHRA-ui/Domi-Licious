<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
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
            $chef = $this->getReference('chef');
            $typeCuisine = new TypeCuisine();
            $typeCuisine->setTitle('orientale');
            $typeCuisine->setDescription('description');
            $typeCuisine->setPhoto('s3.jpg');

            $manager->persist($typeCuisine);

            $chef2 = $this->getReference('chef');
            $typeCuisine2 = new TypeCuisine();
            $typeCuisine2->setTitle('japonnais');
            $typeCuisine2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine2->setPhoto('s2.jpg');

            $manager->persist($typeCuisine2);

            $chef3 = $this->getReference('chef');
            $typeCuisine3 = new TypeCuisine();
            $typeCuisine3->setTitle('asiatique');
            $typeCuisine3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine3->setPhoto('s4.jpg');

            $manager->persist($typeCuisine3);

            $chef4 = $this->getReference('chef');
            $typeCuisine4 = new TypeCuisine();
            $typeCuisine4->setTitle('francais');
            $typeCuisine4->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine4->setPhoto('s5.jpg');

            $manager->persist($typeCuisine4);

            $chef5 = $this->getReference('chef');
            $typeCuisine5 = new TypeCuisine();
            $typeCuisine5->setTitle('italien');
            $typeCuisine5->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine5->setPhoto('s6.jpg');

            $manager->persist($typeCuisine5);

            $chef6 = $this->getReference('chef');
            $typeCuisine6 = new TypeCuisine();
            $typeCuisine6->setTitle('mexicain');
            $typeCuisine6->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine6->setPhoto('s7.jpg');

            $manager->persist($typeCuisine6);

      
         $manager->flush();

         $this->addReference('type-cuisine', $typeCuisine);

    }

}
