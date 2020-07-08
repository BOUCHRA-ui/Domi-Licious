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
use App\Entity\TypeCuisine;

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
        $manager->persist($menu);

        $user = new User();
        $user->setNom('AdminNom');
        $user->setPrenom('AdminPrenom');       
        $user->setEmail('admin@domilicious.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setAdresse('24 rue de la bodega 93600 aulnay sous bois');
        $user->setTelephone('01.42.45.46.48');
        $user->setBookings($this->getReference('bookings'));
        $user->setCommentaires($this->getReference('commentaires'));
        
        $password = $this->encoder->encodePassword($user, 'admin');
        $user->setPassword($password);

        $manager->persist($user);

        $this->addReference('user-admin',$user);
        $this->addReference('bookings',$user);
        $this->addReference('commentaires',$user);

        $user2 = new User();
        $user2->setEmail('test@test.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPrenom('bouchra');
        $user2->setNom('trabelsi');
        $user2->setAdresse('25 rue reoland rarross 93250 Pantin');
        $user2->setCommentaires($this->getReference('commentaires'));
        $user2->setTelephone('01.02.00.04.06');
        $user2->setBookings($this->getReference('bookings'));

        $password = $this->encoder->encodePassword($user2, 'pass_1234');
        $user->setPassword($password);
       
        $this->addReference('user-user', $user);
        $this->addReference('commentaires',$user2);
        $this->addReference('bookings',$user2);
        
        $manager->persist($user2);
      
        for ($count = 1; $count < 7; $count++) {
        $menu = new Menu();
        $menu->setEntree('Salade de Concombre sur son lit d\'Ananas');
        $menu->setPlat('Duo de saumon sur son tartare de boeuf');
        $menu->setDessert('Crêpe de Nutella');
        $menu->setImage('s3.jpg');
        $menu->setTypeCuisine($this->getReference('typeCuisine'));
        $menu->setChef($this->getReference('chef'));

        $this->addReference('chef',$menu);
        $this->addReference('typeCuisine',$menu);

        $manager->persist($menu);
        }

        $commentaire1 = new Commentaire();
        $commentaire1->setTitre('titre');
        $commentaire1->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire1->setCreatedAt(New \DateTime());
        $commentaire1->setEmail($this->getReference('user-admin'));
        
        $this->addReference('user-admin',$commentaire1);
        
        $manager->persist($commentaire1);

        $commentaire2 = new Commentaire();
        $commentaire2->setTitre('titre');
        $commentaire2->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire2->setCreatedAt(New \DateTime());
        $commentaire2->setEmail($this->getReference('user-admin'));

        $this->addReference('user-admin',$commentaire2);

        $manager->persist($commentaire2);

        $commentaire3 = new Commentaire();
        $commentaire3->setTitre('titre');
        $commentaire3->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire3->setCreatedAt(New \DateTime());
        $commentaire3->setEmail($this->getReference('user-admin'));
        
        $this->addReference('user-admin',$commentaire3);
        
        $manager->persist($commentaire3);

        for ($count2 = 1; $count2 < 7; $count2++) {
        $chef = new Chef();
        $chef->setNom('Baruch');
        $chef->setPrenom('Emmanuel');
        $chef->setPresentation('presentation');
        $chef->setTypeCuisine('orientale');
        $chef->setMenu('menu');
        $chef->setImage('s3.jpg');
        }
        
        $manager->persist($chef);
        $manager->persist($chef2);
        $manager->persist($chef3);
        $manager->persist($chef4);
        $manager->persist($chef5);
        $manager->persist($chef6);
      
        $user = new User();
        $user->setEmail('test@test.com');
        $user->setRoles(['ROLE_USER']);
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
      
        $this->addReference('user-user', $user);
        $this->addReference('user-user1', $user2);
        $this->addReference('user-user2', $user3);
        $this->addReference('user-user3', $user4);
        $this->addReference('user-user4', $user5);
        $this->addReference('user-user5', $user6);

         for ($count3 = 1; $count3< 20; $count3++) {
         $booking = new Booking();
         $booking->setUser($this->getReference('user-user'));
         $booking->setDateReservation(new \Datetime());
         $booking->setMessage('message');
         $booking->setEmail($this->getReference('user-user'));

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
        
         $this->addReference('user-user',$booking);
         $this->addReference('menu',$booking);
      
         $manager->persist($booking);
        }

        for ($count4 = 1; $count4 < 7; $count4++) {
            $typeCuisine = new TypeCuisine();
            $typeCuisine->setTitle('title');
            $typeCuisine->setDescription('description');
            $typeCuisine->setImage('s3.jpg');
            $typeCuisine->setChefs($this->getReference('chefs'));
            $typeCuisine->setMenus($this->getReference('menus'));
   
            $this->addReference('chefs',$typeCuisine);
            $this->addReference('menus',$typeCuisine);
   
            $manager->persist($typeCuisine);
           }

         $manager->flush();
    }
}
