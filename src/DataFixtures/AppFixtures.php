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
        
        $this->addReference('menu',$chef);

        $manager->persist($chef);

         for ($count3 = 1; $count3< 20; $count3++) {
         $booking = new Booking();
         $booking->setUser($this->getReference('user-user'));
         $booking->setDateReservation(new \Datetime());
         $booking->setMessage('message');
         $booking->setMenu($this->getReference('menu'));
        
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
