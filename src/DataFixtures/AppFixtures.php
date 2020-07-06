<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Commentaire;
use App\Entity\User;

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
        
        // $product = new Product();
        // $manager->persist($product);
        $manager->flush();
    }
}
