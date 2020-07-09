<?php

namespace App\DataFixtures;

use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\User;
use App\Entity\Commentaire;


class CommentaireFixture extends Fixture implements DependentFixtureInterface
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }        

    public function load(ObjectManager $manager)
    {
        
        $user = new User();
        

        $commentaire1 = new Commentaire();
        $commentaire1->setTitre('titre');
        $commentaire1->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire1->setCreatedAt(New DateTimeImmutable());
        $commentaire1->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire1);

        $commentaire2 = new Commentaire();
        $commentaire2->setTitre('titre');
        $commentaire2->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire2->setCreatedAt(New DateTime());
        $commentaire2->setEmail($this->getReference(UserFixture::USER_REFERENCE));

        $manager->persist($commentaire2);

        $commentaire3 = new Commentaire();
        $commentaire3->setTitre('titre');
        $commentaire3->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire3->setCreatedAt(New DateTime());
        $commentaire3->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire3);

        $commentaire4 = new Commentaire();
        $commentaire4->setTitre('titre');
        $commentaire4->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire4->setCreatedAt(New DateTime());
        $commentaire4->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire4);

        $commentaire5 = new Commentaire();
        $commentaire5->setTitre('titre');
        $commentaire5->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire5->setCreatedAt(New DateTime());
        $commentaire5->setEmail($this->getReference(UserFixture::USER_REFERENCE));
    
        $manager->persist($commentaire5);

        $commentaire6 = new Commentaire();
        $commentaire6->setTitre('titre');
        $commentaire6->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire6->setCreatedAt(New DateTime());
        $commentaire6->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire6);

        $commentaire7 = new Commentaire();
        $commentaire7->setTitre('titre');
        $commentaire7->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire7->setCreatedAt(New DateTime());
        $commentaire7->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire7);

        $commentaire8 = new Commentaire();
        $commentaire8->setTitre('titre');
        $commentaire8->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire8->setCreatedAt(New DateTime());
        $commentaire8->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire8);

        $commentaire9 = new Commentaire();
        $commentaire9->setTitre('tiLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.tre');
        $commentaire9->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire9->setCreatedAt(New DateTime());
        $commentaire9->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire9);

        $commentaire10 = new Commentaire();
        $commentaire10->setTitre('titre');
        $commentaire10->setMessage('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $commentaire10->setCreatedAt(New DateTime());
        $commentaire10->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire3);

         $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixture::class,
        );
    }
}
