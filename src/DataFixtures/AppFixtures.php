<?php

namespace App\DataFixtures;

use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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

        $admin = new User();
        $admin->setNom('AdminNom');
        $admin->setPrenom('AdminPrenom');
        $admin->setEmail('admin@domilicious.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setAdresse('24 rue de la bodega 93600 aulnay sous bois');
        $admin->setTelephone('01.42.45.46.48');
        
        $password = $this->encoder->encodePassword($admin, 'admin');
        $admin->setPassword($password);

        $manager->persist($admin);

        $user2 = new User();
        $user2->setEmail('test10@test.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPrenom('bouchra');
        $user2->setNom('trabelsi');
        $user2->setAdresse('25 rue reoland rarross 93250 Pantin');
        $user2->setTelephone('01.02.00.04.06');

        $password = $this->encoder->encodePassword($user2, 'pass_1234');
        $user2->setPassword($password);
       
        $this->addReference('user2', $user2);
        
        $manager->persist($user2);

        for ($count4 = 1; $count4 < 7; $count4++) {
            $typeCuisine = new TypeCuisine();
            $typeCuisine->setTitle('title');
            $typeCuisine->setDescription('description');
            $typeCuisine->setPhoto('s3.jpg');
            $manager->persist($typeCuisine);
        }

        $commentaire1 = new Commentaire();
        $commentaire1->setTitre('titre');
        $commentaire1->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire1->setCreatedAt(New DateTimeImmutable());
        $commentaire1->setEmail($user2);
        
        $manager->persist($commentaire1);

        $commentaire2 = new Commentaire();
        $commentaire2->setTitre('titre');
        $commentaire2->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire2->setCreatedAt(New DateTime());
        $commentaire2->setEmail($user2);

        $this->addReference('user-admin',$commentaire2);

        $manager->persist($commentaire2);

        $commentaire3 = new Commentaire();
        $commentaire3->setTitre('titre');
        $commentaire3->setMessage('message blalblabjbejfgjhgfhb');
        $commentaire3->setCreatedAt(New DateTime());
        $commentaire3->setEmail($admin);
        
        $manager->persist($commentaire3);

        for ($count2 = 1; $count2 < 7; $count2++) {
        $chef = new Chef();
        $chef->setNom('Baruch');
        $chef->setPrenom('Emmanuel');
        $chef->setPresentation('presentation');
        $chef->setTypeDeCuisine('Asiatique');
        $chef->setMenu('menu 1');
        $chef->setImage('chef-cuisinier.jpg');

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
        }



        for ($count = 1; $count < 7; $count++) {
            $menu = new Menu();
            $menu->setEntree('Salade de Concombre sur son lit d\'Ananas');
            $menu->setPlat('Duo de saumon sur son tartare de boeuf');
            $menu->setDessert('Crêpe de Nutella');
            $menu->setImage('s3.jpg');
            $menu->setTypeCuisine($typeCuisine);
            $menu->setChef($chef);
            $manager->persist($menu);
        }
      
        $user = new User();
        $user->setEmail('test1@test.com');
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

         for ($count3 = 1; $count3< 20; $count3++) {
         $booking = new Booking();
         $booking->setDateReservation(new Datetime());
         $booking->setMessage('message');
         $booking->setMenu($menu);
         $booking->setUser($user3);

         $booking2 = new Booking();
         $booking2->setDateReservation(new Datetime());
         $booking2->setMessage('message');
         $booking2->setMenu($menu);
         $booking2->setUser($user4);

         $booking3 = new Booking();
         $booking3->setDateReservation(new Datetime());
         $booking3->setMessage('message');
         $booking3->setMenu($menu);
         $booking3->setUser($user3);

         $booking4 = new Booking();
         $booking4->setDateReservation(new Datetime());
         $booking4->setMessage('message');
         $booking4->setMenu($menu);
         $booking4->setUser($user5);

         $booking5 = new Booking();
         $booking5->setDateReservation(new Datetime());
         $booking5->setMessage('message');
         $booking5->setMenu($menu);
         $booking5->setUser($user5);

         $booking6 = new Booking();
         $booking6->setDateReservation(new Datetime());
         $booking6->setMessage('message');
         $booking6->setMenu($menu);
         $booking6->setUser($user6);

         $manager->persist($booking);
         $manager->persist($booking2);
         $manager->persist($booking3);
         $manager->persist($booking4);
         $manager->persist($booking5);
         $manager->persist($booking6);
      
        }

         $manager->flush();
    }
}
