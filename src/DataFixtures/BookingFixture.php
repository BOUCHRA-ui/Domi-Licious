<?php

namespace App\DataFixtures;

use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Booking;
use App\Entity\Menu;
use App\Entity\User;

class BookingFixture extends Fixture implements DependentFixtureInterface

{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }        

    public function load(ObjectManager $manager)
    {
          
         $user = $this->getReference(UserFixture::USER_REFERENCE);
         $user2 = $this->getReference(UserFixture::USER_REFERENCE2);
         $user3 = $this->getReference(UserFixture::USER_REFERENCE3);
         $user4 = $this->getReference(UserFixture::USER_REFERENCE4);
         $user5 = $this->getReference(UserFixture::USER_REFERENCE5);
         $user6 = $this->getReference(UserFixture::USER_REFERENCE6);

         $menu = $this->getReference('menu');
         $menu2 = $this->getReference('menu');
         $menu3 = $this->getReference('menu');
         $menu4 = $this->getReference('menu');
         $menu5 = $this->getReference('menu');
         $menu6 = $this->getReference('menu');
        
         
         $booking = new Booking();
         $booking->setDateReservation(new Datetime());
         $booking->setMessage('je souhaite reserver pour vendredi au soir');
         $booking->setMenu($menu);
         $booking->setUser($user);

         $booking2 = new Booking();
         $booking2->setDateReservation(new Datetime());
         $booking2->setMessage('je souhaite reserver le chef Hugo');
         $booking2->setMenu($menu2);
         $booking2->setUser($user2);

         $booking3 = new Booking();
         $booking3->setDateReservation(new Datetime());
         $booking3->setMessage('je souhaite reserver pour vendredi au soir');
         $booking3->setMenu($menu3);
         $booking3->setUser($user3);

         $booking4 = new Booking();
         $booking4->setDateReservation(new Datetime());
         $booking4->setMessage('je souhaite reserver pour jeudi au soir');
         $booking4->setMenu($menu4);
         $booking4->setUser($user4);

         $booking5 = new Booking();
         $booking5->setDateReservation(new Datetime());
         $booking5->setMessage('je souhaite reserver pour vendredi au soir');
         $booking5->setMenu($menu5);
         $booking5->setUser($user5);

         $booking6 = new Booking();
         $booking6->setDateReservation(new Datetime());
         $booking6->setMessage('je souhaite reserver pour samedi au soir');
         $booking6->setMenu($menu6);
         $booking6->setUser($user6);

         $manager->persist($booking);
         $manager->persist($booking2);
         $manager->persist($booking3);
         $manager->persist($booking4);
         $manager->persist($booking5);
         $manager->persist($booking6);
      
       
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            UserFixture::class,
            MenuFixture::class,
        );
    }
}