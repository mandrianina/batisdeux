<?php 

namespace Batis\CrowdsourcingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Batis\CrowdsourcingBundle\Entity\Image;

class LoadImageData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $image = new Image();
        $image->setUrl('www.gglglgl.com');
        $image->setAlt('image_user');
        $manager->persist($image);
        $manager->flush();

        $this->addReference('image', $image);

    }

    public function getOrder()
    {
        return 3;
    }
}