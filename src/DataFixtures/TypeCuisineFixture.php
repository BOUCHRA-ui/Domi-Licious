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
            $typeCuisine->setTitle('orientale');
            $typeCuisine->setDescription('description');
            $typeCuisine->setPhoto('s3.jpg');

            $manager->persist($typeCuisine);

            $typeCuisine2 = new TypeCuisine();
            $typeCuisine2->setTitle('japonais');
            $typeCuisine2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine2->setPhoto('s2.jpg');

            $manager->persist($typeCuisine2);

            $typeCuisine3 = new TypeCuisine();
            $typeCuisine3->setTitle('asiatique');
            $typeCuisine3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine3->setPhoto('s4.jpg');

            $manager->persist($typeCuisine3);

            $typeCuisine4 = new TypeCuisine();
            $typeCuisine4->setTitle('francais');
            $typeCuisine4->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine4->setPhoto('s5.jpg');

            $manager->persist($typeCuisine4);

            $typeCuisine5 = new TypeCuisine();
            $typeCuisine5->setTitle('italien');
            $typeCuisine5->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine5->setPhoto('s6.jpg');

            $manager->persist($typeCuisine5);

            $typeCuisine6 = new TypeCuisine();
            $typeCuisine6->setTitle('mexicain');
            $typeCuisine6->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $typeCuisine6->setPhoto('s7.jpg');

            $manager->persist($typeCuisine6);

      
         $manager->flush();

         $this->addReference('type-orientale', $typeCuisine);
         $this->addReference('type-japonais', $typeCuisine2);
         $this->addReference('type-asiatique', $typeCuisine3);
         $this->addReference('type-francais', $typeCuisine4);
         $this->addReference('type-italien', $typeCuisine5);
         $this->addReference('type-mexicain', $typeCuisine6);

    }
}
