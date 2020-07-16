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
        $typeCuisine = $this->getReference('type-orientale');
        $typeCuisine2 = $this->getReference('type-japonais');
        $typeCuisine3 = $this->getReference('type-asiatique');
        $typeCuisine4 = $this->getReference('type-francais');
        $typeCuisine5 = $this->getReference('type-italien');
        $typeCuisine6 = $this->getReference('type-mexicain');

        $chef = new Chef();
        $chef->setNom('Baruch');
        $chef->setPrenom('Emmanuel');
        $chef->setPresentation('Emmanuel a baigné dès l\'enfance dans l\'univers de la gastronomie. Son père et son grand-père, éminents amateurs des arts de la table, courent les restaurants étoilés de la Côte d\'Azur. Passionnée et amoureux des desserts, il vous enchantera du début à la fin du repas.');
        $chef->setTypeCuisine($typeCuisine4);
        $chef->setImage('chef-de-cuisine.jpg');

        $manager->persist($chef);

        $chef2 = new Chef();
        $chef2->setNom('Dupont');
        $chef2->setPrenom('Henry');
        $chef2->setPresentation('Dans son auberge typiquement picarde, Henry refuse de se cantonner aux seuls produits du Nord, et n\'a de cesse de chercher de nouveaux accords et de nouvelles saveurs qui bousculent et ravissent nos palais. Il aime profondément son métier et surtout faire plaisir. En quête de nouveaux goûts à travers toutes les cuisines du monde, il vous concoctera certainement votre menu parfait.');
        $chef2->setTypeCuisine($typeCuisine2);
        $chef2->setImage('chef-cuisinier2.jpg');

        $manager->persist($chef2);

        $chef3 = new Chef();
        $chef3->setNom('Sanchez');
        $chef3->setPrenom('Camelia');
        $chef3->setPresentation('Camelia est déjà familière des établissements étoilés puisqu\'en 2001, elle découvrait les cuisines du George V aux côtés de Philippe Legendre puis de Philippe Jourdin. En 2010, elle prenait les rennes de deux restaurants du Four Seasons. Rares sont celles qui font leurs armes avec une telle tenacité! Très rigoureuse et perfectionniste, elle vous fera vivre un grand voyage au pays des papilles gustatives par milliers.');
        $chef3->setTypeCuisine($typeCuisine3);
        $chef3->setImage('chef-cuisinier3.jpg');

        $manager->persist($chef3);

        $chef4 = new Chef();
        $chef4->setNom('Luciano');
        $chef4->setPrenom('Luis');
        $chef4->setPresentation('Encore élève à l\'école hôtelière de La Rochelle, Luis passait, sans le savoir, devant son futur restaurant sur cette petite route entre mer et montagne qui devait le mener vers Rome. Ainsi tous les chemins menant jusque la-bas, il mêle cuisine italienne et francaise à la perfection. Les antipastis sont son dada et la pizza a trouvé son roi!');
        $chef4->setTypeCuisine($typeCuisine5);
        $chef4->setImage('chef-cuisinier4.jpg');

        $manager->persist($chef4);

        $chef5 = new Chef();
        $chef5->setNom('Badah');
        $chef5->setPrenom('Gilles');
        $chef5->setPresentation('Gilles se forme dans de grands restaurants et acquiert comme chef deux étoiles Michelin chez Joël Robuchon. Il ouvre son propre restaurant en 2010 à Paris où il obtient l\'année suivante une étoile Michelin. Bistronome et passionnée, il présente une carte différente chaque semaine avec des produits frais et en cycle court. Amateur de grands vins, il saura vous conseiller celui qui accomodera ses plats parfaitement.');
        $chef5->setTypeCuisine($typeCuisine);
        $chef5->setImage('chef-cuisinier5.jpg');

        $manager->persist($chef5);

        $chef6 = new Chef();
        $chef6->setNom('Monty');
        $chef6->setPrenom('Prisca');
        $chef6->setPresentation(' Elle se forme au sein du prestigieux Institut Paul Bocuse à Lyon où elle fait la connaissance du chef triplement étoilé. Ce dernier voit en elle une jeune femme très talentueuse et la prend sous son aile. Elle apprendra beaucoup de techniques qu\'elle perfectionnera dans les cuisines du palais de l\'Elysées. Elle participera par la suite aux qualifications Top Chef et sortira au 3ème tour avec le coup de coeur du chef Gagnaire avec qui elle travaille encore aujourd\'hui');
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