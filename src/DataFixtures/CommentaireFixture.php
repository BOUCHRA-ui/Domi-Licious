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

        $commentaire1 = new Commentaire();
        $commentaire1->setTitre('Super Cuisinier');
        $commentaire1->setMessage('Le meilleur cuisinier de Saine Saint Denis!!! Un un excellent service!
        Le cuisinier est disponible est surtout très agréable :)
        Nous renouvellerons l\'expérience très vite!');
        $commentaire1->setCreatedAt(New DateTimeImmutable());
        $commentaire1->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire1);

        $commentaire2 = new Commentaire();
        $commentaire2->setTitre('Concept original');
        $commentaire2->setMessage('Accueil chaleureux, cuisine faite maison avec des produits frais du terroir, de très bons plats, un décor original,sympathique. Nous avons passé une soirée très agréable et nous y retournerons.
        N\'hésitez pas!!');
        $commentaire2->setCreatedAt(New DateTime());
        $commentaire2->setEmail($this->getReference(UserFixture::USER_REFERENCE));

        $manager->persist($commentaire2);

        $commentaire3 = new Commentaire();
        $commentaire3->setTitre('Epoustouflant');
        $commentaire3->setMessage('Je vous remercie encore pour votre accueil et surtout ce délicieux déjeuner qui a égayé mon anniversaire en ce 30/09 !');
        $commentaire3->setCreatedAt(New DateTime());
        $commentaire3->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire3);

        $commentaire4 = new Commentaire();
        $commentaire4->setTitre('Délices à tous les étages');
        $commentaire4->setMessage('Une autre merveilleuse soirée grace à à vous ! Merci encore pour cette ambiance et la cuisine toujours pleine de saveurs et d\'inspiration ! Vaiment délicieux ! L\'assiette japonaise et le wok thai!');
        $commentaire4->setCreatedAt(New DateTime());
        $commentaire4->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire4);

        $commentaire5 = new Commentaire();
        $commentaire5->setTitre('Quelle évolution!');
        $commentaire5->setMessage('Quelle évolution ! Vos cuisine est de plus en plus aboutie, votre carte s\'étoffe, on sent que votre équipe, visiblement très soudée, a à coeur de satisfaire les clients. Nous revenons chaque fois
        avec plus de plaisir : Continuez !');
        $commentaire5->setCreatedAt(New DateTime());
        $commentaire5->setEmail($this->getReference(UserFixture::USER_REFERENCE));
    
        $manager->persist($commentaire5);

        $commentaire6 = new Commentaire();
        $commentaire6->setTitre('Plaisir de partage');
        $commentaire6->setMessage('un plaisir, tant pour les papilles que pour la détente, sans compter l\'accueil et le service rafiné.');
        $commentaire6->setCreatedAt(New DateTime());
        $commentaire6->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire6);

        $commentaire7 = new Commentaire();
        $commentaire7->setTitre('Encore un chef à la maison');
        $commentaire7->setMessage('A quand le prochain atelier de Sushis? ^0^');
        $commentaire7->setCreatedAt(New DateTime());
        $commentaire7->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire7);

        $commentaire8 = new Commentaire();
        $commentaire8->setTitre('Super dîner!!!');
        $commentaire8->setMessage('Nous avons passé une très bonne soirée. Vos plats sont plein de vitalité, de fraîcheur et de saveurs gourmandes. Nos invités étaient ravis de découvrir votre cuisine,
        fort différent de ce que nous connaissons à Aulnay ! Et que dire de votre foie gras maison !!! Merci, à très bientôt !');
        $commentaire8->setCreatedAt(New DateTime());
        $commentaire8->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire8);

        $commentaire9 = new Commentaire();
        $commentaire9->setTitre('Cuisiner au top');
        $commentaire9->setMessage('j\'aime beaucoup votre cuisine, et j\'aimerais y fêter mon anniversaire : pouvez-vous svp m\'indiquer le nombre de personnes que vous pouvez recevoir pour une soirée privatisée
        ?
        merci');
        $commentaire9->setCreatedAt(New DateTime());
        $commentaire9->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire9);

        $commentaire10 = new Commentaire();
        $commentaire10->setTitre('Chefs de haute volée');
        $commentaire10->setMessage('Bravo, continuez... c\'est de mieux en mieux !');
        $commentaire10->setCreatedAt(New DateTime());
        $commentaire10->setEmail($this->getReference(UserFixture::USER_REFERENCE));
        
        $manager->persist($commentaire10);

         $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixture::class,
        );
    }
}
