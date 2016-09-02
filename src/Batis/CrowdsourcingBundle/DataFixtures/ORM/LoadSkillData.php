<?php 

namespace Batis\CrowdsourcingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Batis\CrowdsourcingBundle\Entity\Skill;

class LoadSkillData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $skill = new Skill();
        $skill->setName("php");
        $manager->persist($skill);
        $manager->flush();

        $this->addReference('skill', $skill);

    }

    public function getOrder()
    {
        return 4;
    }
}