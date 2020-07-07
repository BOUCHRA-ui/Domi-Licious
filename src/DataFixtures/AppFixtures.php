<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Chef;
use App\Entity\User;
use App\Entity\Booking;
use App\Entity\Commentaire;
use App\Entity\Menu;

class AppFixtures extends Fixture
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }        

    public function load(ObjectManager $manager)
    {

        $menu = new Menu();
        $menu->setEntree('Salade de Concombre sur son lit d\'Ananas');
        $menu->setPlat('Duo de saumon sur son tartare de boeuf');
        $menu->setDessert('Crêpe de Nutella');
        $manager->flush();

        $user = new User();
        $user->setNom('Kuijer');
        $user->setPrenom('Jess');       
        $user->setEmail('jessicakuijer@me.com');
        $user->setRoles(['ROLE_ADMIN']);
        
        $password = $this->encoder->encodePassword($user, '684500');
        $user->setPassword($password);

        $manager->persist($user);

        $this->addReference('user-admin',$user);

        $commentaire1 = new Commentaire();
        $commentaire1->setTitre('titre');
        $commentaire1->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire1->setCreatedAt(New \DateTime());
        $commentaire1->setEmail($this->getReference('user-admin'));

        $manager->persist($commentaire1);

        $commentaire2 = new Commentaire();
        $commentaire2->setTitre('titre');
        $commentaire2->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire2->setCreatedAt(New \DateTime());
        $commentaire2->setEmail($this->getReference('user-admin'));

        $manager->persist($commentaire2);

        $commentaire3 = new Commentaire();
        $commentaire3->setTitre('titre');
        $commentaire3->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire3->setCreatedAt(New \DateTime());
        $commentaire3->setEmail($this->getReference('user-admin'));

        $manager->persist($commentaire3);
        $manager->flush();

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