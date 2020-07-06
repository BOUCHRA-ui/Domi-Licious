<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\Booking;

class AppFixtures extends Fixture
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@test.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPrenom('bouchra');
        $user->setNom('trabelsi');

        $password = $this->encoder->encodePassword($user, 'pass_1234');
        $user->setPassword($password);
        // $product = new Product();

        $user2 = new User();
        $user2->setEmail('test2@test.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPrenom('client');
        $user2->setNom('client');

        $password = $this->encoder->encodePassword($user2, 'pass_1234');
        $user2->setPassword($password);
        // $product = new Product();

        $user3 = new User();
        $user3->setEmail('test3@test.com');
        $user3->setRoles(['ROLE_USER']);
        $user3->setPrenom('client');
        $user3->setNom('client');

        $password = $this->encoder->encodePassword($user3, 'pass_1234');
        $user3->setPassword($password);
        // $product = new Product();

        $user4 = new User();
        $user4->setEmail('test4@test.com');
        $user4->setRoles(['ROLE_USER']);
        $user4->setPrenom('client');
        $user4->setNom('client');

        $password = $this->encoder->encodePassword($user4, 'pass_1234');
        $user4->setPassword($password);
        // $product = new Product();

        $user5 = new User();
        $user5->setEmail('test5@test.com');
        $user5->setRoles(['ROLE_USER']);
        $user5->setPrenom('client');
        $user5->setNom('client');

        $password = $this->encoder->encodePassword($user5, 'pass_1234');
        $user5->setPassword($password);
        // $product = new Product();


        $user6 = new User();
        $user6->setEmail('test6@test.com');
        $user6->setRoles(['ROLE_USER']);
        $user6->setPrenom('client');
        $user6->setNom('client');

        $password = $this->encoder->encodePassword($user6, 'pass_1234');
        $user6->setPassword($password);
        // $product = new Product();

        $manager->persist($user);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);
        $manager->persist($user5);
        $manager->persist($user6);
      
        $this->addReference('user-admin', $user);
        $this->addReference('user-user', $user2);
        $this->addReference('user-user2', $user3);
        $this->addReference('user-user3', $user4);
        $this->addReference('user-user4', $user5);
        $this->addReference('user-user5', $user6);

         $booking = new Booking();
         $booking->setNom('nom');
         $booking->setPrenom('prenom');
         $booking->setSujet('sujet');
         $booking->setCreatedAt(new \Datetime());
         $booking->setMessage('message');
         $booking->setEmail($this->getReference('user-admin'));

         $booking2 = new Booking();
         $booking2->setNom('nom');
         $booking2->setPrenom('prenom');
         $booking2->setSujet('sujet');
         $booking2->setCreatedAt(new \Datetime());
         $booking2->setMessage('message');
         $booking2->setEmail($this->getReference('user-user'));

         $booking3 = new Booking();
         $booking3->setNom('nom');
         $booking3->setPrenom('prenom');
         $booking3->setSujet('sujet');
         $booking3->setCreatedAt(new \Datetime());
         $booking3->setMessage('message');
         $booking3->setEmail($this->getReference('user-user2'));

         $booking4 = new Booking();
         $booking4->setNom('nom');
         $booking4->setPrenom('prenom');
         $booking4->setSujet('sujet');
         $booking4->setCreatedAt(new \Datetime());
         $booking4->setMessage('message');
         $booking4->setEmail($this->getReference('user-user3'));

         $booking5 = new Booking();
         $booking5->setNom('nom');
         $booking5->setPrenom('prenom');
         $booking5->setSujet('sujet');
         $booking5->setCreatedAt(new \Datetime());
         $booking5->setMessage('message');
         $booking5->setEmail($this->getReference('user-user4'));

         $booking6 = new Booking();
         $booking6->setNom('nom');
         $booking6->setPrenom('prenom');
         $booking6->setSujet('sujet');
         $booking6->setCreatedAt(new \Datetime());
         $booking6->setMessage('message');
         $booking6->setEmail($this->getReference('user-user5'));

         $manager->persist($booking);
         $manager->persist($booking2);
         $manager->persist($booking3);
         $manager->persist($booking4);
         $manager->persist($booking5);
         $manager->persist($booking6);
        
         $manager->flush();
    }
}
