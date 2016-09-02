<?php 

namespace Batis\CrowdsourcingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Batis\CrowdsourcingBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category_un = new Category();
        $category_un->setName('Informatique');

        $manager->persist($category_un);
        $manager->flush();

        $this->addReference('category', $category_un);


    }

    public function getOrder()
    {
        return 2;
    }
}