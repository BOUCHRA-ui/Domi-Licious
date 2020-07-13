<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Chef;
use App\Entity\Menu;
use App\Entity\TypeCuisine;


class ChefFixture extends Fixture implements DependentFixtureInterface
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }        

    public function load(ObjectManager $manager)
    {            
        $typeCuisine = $this->getReference('type-asiatique');

        $chef = new Chef();
        $chef->setNom('Baruch');
        $chef->setPrenom('Emmanuel');
        $chef->setPresentation('Emmanuel a baigné dès l\'enfance dans l\'univers de la gastronomie. Son père et son grand-père, éminents amateurs des arts de la table, courent les restaurants étoilés de la Côte d\'Azur...');
        $chef->setTypeCuisine($typeCuisine);
        $chef->setImage('cehftopchef.jpg');

        $manager->persist($chef);

        $typeCuisine2 = $this->getReference('type-vegetarian');
        $chef2 = new Chef();
        $chef2->setNom('Dupont');
        $chef2->setPrenom('Henry');
        $chef2->setPresentation('Dans son auberge typiquement picarde, Henry refuse de se cantonner aux seuls produits du Nord, et n\'a de cesse de chercher de nouveaux accords et de nouvelles saveurs qui bousculent et ravissent nos palais.');
        $chef2->setTypeCuisine($typeCuisine2);
        $chef2->setImage('chef-cuisinier2.jpg');

        $manager->persist($chef2);

        $typeCuisine3 = $this->getReference('type-mexicain');
        $chef3 = new Chef();
        $chef3->setNom('Sanchez');
        $chef3->setPrenom('Camelia');
        $chef3->setPresentation('Camelia est déjà familière des établissements étoilés puisqu\'en 2001, elle découvrait les cuisines du George V aux côtés de Philippe Legendre puis de Philippe Jourdin. En 2010, elle prenait les rennes de deux restaurants du Four Seasons...');
        $chef3->setTypeCuisine($typeCuisine3);
        $chef3->setImage('chef-cuisinier3.jpg');

        $manager->persist($chef3);

        $typeCuisine4 = $this->getReference('type-francais');
        $chef4 = new Chef();
        $chef4->setNom('Luciano');
        $chef4->setPrenom('Luis');
        $chef4->setPresentation('Encore élève à l\'école hôtelière de La Rochelle, Luis passait, sans le savoir, devant son futur restaurant sur cette petite route entre mer et montagne qui devait le mener vers Rome...');
        $chef4->setTypeCuisine($typeCuisine4);
        $chef4->setImage('chef-cuisinier4.jpg');

        $manager->persist($chef4);

        $typeCuisine5 = $this->getReference('type-italien');
        $chef5 = new Chef();
        $chef5->setNom('Badah');
        $chef5->setPrenom('Gilles');
        $chef5->setPresentation(' Gilles se forme dans de grands restaurants et acquiert comme chef deux étoiles Michelin chez Joël Robuchon. Il ouvre son propre restaurant en 2010 à Paris où il obtient l\'année suivante une étoile Michelin...');
        $chef5->setTypeCuisine($typeCuisine5);
        $chef5->setImage('chef-cuisinier5.jpg');

        $manager->persist($chef5);

        $typeCuisine6 = $this->getReference('type-vegetarian');
        $chef6 = new Chef();
        $chef6->setNom('Monty');
        $chef6->setPrenom('Prisca');
        $chef6->setPresentation(' Elle se forme au sein du prestigieux Institut Paul Bocuse à Lyon où elle fait la connaissance du chef triplement étoilé. Ce dernier voit en elle une jeune femme très talentueuse et la prend sous son aile...');
        $chef6->setTypeCuisine($typeCuisine6);
        $chef6->setImage('chef-cuisinier6.jpg');

        $manager->persist($chef6);
        $manager->flush();

        $this->addReference('chef', $chef);
        $this->addReference('chef2', $chef2);
        $this->addReference('chef3', $chef3);
        $this->addReference('chef4', $chef4);
        $this->addReference('chef5', $chef5);
        $this->addReference('chef6', $chef6);
    
    }

    public function getDependencies()
    {
        return array(
            TypeCuisineFixture::class
        );
    }
}