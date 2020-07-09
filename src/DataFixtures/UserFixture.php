<?php

namespace App\DataFixtures;

use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\User;

class UserFixture extends Fixture
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }        
   
    public const USER_REFERENCE = 'user-admin';
    public const USER_REFERENCE2 = 'user-user2';
    public const USER_REFERENCE3 = 'user-user3';
    public const USER_REFERENCE4 = 'user-user4';
    public const USER_REFERENCE5 = 'user-user5';
    public const USER_REFERENCE6 = 'user-user6';
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

        $user = new User();
        $user->setEmail('test1@test.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPrenom('bouchra');
        $user->setNom('trabelsi');
        $user->setAdresse('24 rue de la bodega 93600 aulnay sous bois');
        $user->setTelephone('01.42.45.46.48');

        $password = $this->encoder->encodePassword($user, 'pass_1234');
        $user->setPassword($password);
        

        $user2 = new User();
        $user2->setEmail('test2@test.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPrenom('bertrand');
        $user2->setNom('durand');
        $user2->setAdresse('24 rue de la bodega 93600 aulnay sous bois');
        $user2->setTelephone('01.42.45.46.48');

        $password = $this->encoder->encodePassword($user2, 'pass_1234');
        $user2->setPassword($password);
        

        $user3 = new User();
        $user3->setEmail('test3@test.com');
        $user3->setRoles(['ROLE_USER']);
        $user3->setPrenom('isabelle');
        $user3->setNom('vincent');
        $user3->setAdresse('24 rue de la bodega 93600 aulnay sous bois');
        $user3->setTelephone('01.42.45.46.48');

        $password = $this->encoder->encodePassword($user3, 'pass_1234');
        $user3->setPassword($password);
        

        $user4 = new User();
        $user4->setEmail('test4@test.com');
        $user4->setRoles(['ROLE_USER']);
        $user4->setPrenom('gerges');
        $user4->setNom('dorvalle');
        $user4->setAdresse('24 rue de la bodega 93600 aulnay sous bois');
        $user4->setTelephone('01.42.45.46.48');

        $password = $this->encoder->encodePassword($user4, 'pass_1234');
        $user4->setPassword($password);
       

        $user5 = new User();
        $user5->setEmail('test5@test.com');
        $user5->setRoles(['ROLE_USER']);
        $user5->setPrenom('jessica');
        $user5->setNom('lenormand');
        $user5->setAdresse('24 rue de la bodega 93600 aulnay sous bois');
        $user5->setTelephone('01.42.45.46.48');

        $password = $this->encoder->encodePassword($user5, 'pass_1234');
        $user5->setPassword($password);
        


        $user6 = new User();
        $user6->setEmail('test6@test.com');
        $user6->setRoles(['ROLE_USER']);
        $user6->setPrenom('antoine');
        $user6->setNom('claviler');
        $user6->setAdresse('24 rue de la bodega 93600 aulnay sous bois');
        $user6->setTelephone('01.42.45.46.48');

        $password = $this->encoder->encodePassword($user6, 'pass_1234');
        $user6->setPassword($password);
        
        
        $manager->persist($user);
        
        $manager->persist($user2);
        
        $manager->persist($user3);
        
        $manager->persist($user4);
       
        $manager->persist($user5);
        
        $manager->persist($user6);
    
         $manager->flush();
         $this->addReference(self::USER_REFERENCE, $user);
         $this->addReference(self::USER_REFERENCE2, $user2);
         $this->addReference(self::USER_REFERENCE3, $user3);
         $this->addReference(self::USER_REFERENCE4, $user4);
         $this->addReference(self::USER_REFERENCE5, $user5);
         $this->addReference(self::USER_REFERENCE6, $user6);
    }
    
}


