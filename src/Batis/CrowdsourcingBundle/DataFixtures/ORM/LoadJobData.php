<?php 

namespace Batis\CrowdsourcingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Batis\CrowdsourcingBundle\Entity\Job;


class LoadJobData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        for($i = 0 ; $i < 100; $i++)
        {
            $job = new Job();
            $job->setTitle("Développement d'application web".$i );
            $job->setOverview("At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.");
            $job->setBudgetMin(500);
            $job->setBudgetMax(1500);
            $job->setLocation('Paris, France');
            $job->setExpiresAt(new \DateTime('2016-10-10'));
            $job->setToken($i);
            $job->setCategory($this->getReference('category'));
            $job->setUser($this->getReference('user'));
            //$job->setImage($this->getReference('image'));
            $job->getSkills()->add($this->getReference('skill'));

            $this->addReference('job'.$i , $job);

            $manager->persist($job);
        }
        
        $manager->flush();

        


    }

    public function getOrder()
    {
        return 5;
    }
}