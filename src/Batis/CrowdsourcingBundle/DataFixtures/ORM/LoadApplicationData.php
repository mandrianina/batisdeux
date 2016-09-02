<?php 

namespace Batis\CrowdsourcingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Batis\CrowdsourcingBundle\Entity\Application;

class LoadApplicationData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($j = 0 ; $j < 100 ; $j++)
        {
            $job = $this->getReference('job'.$j);
            for($i = 0 ; $i < 10; $i++)
            {       
                $application = new Application();
                $application->setUser($this->getReference('userapplicant'));
                $application->setJob($job);
                $application->setDescription("Je suis super intéréssé ".$i);
                $application->setTemps(10);
                $application->setBudget(450 + (int)$i);

                $manager->persist($application);
            }
        }
        $manager->flush();

    }

    public function getOrder()
    {
        return 6;
    }
}