<?php 

namespace Batis\CrowdsourcingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Batis\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
    	$user->setUsername('totol');
    	$user->setEmail('toto@mail.com');
    	$user->setPassword('test');

        $user_applicant = new User();
        $user_applicant->setUsername('derpina');
        $user_applicant->setEmail('derp@mail.org');
        $user_applicant->setPassword('test');

        $manager->persist($user);
        $manager->persist($user_applicant);
        $manager->flush();

        $this->addReference('user', $user);
        $this->addReference('userapplicant', $user_applicant);

    }

    public function getOrder()
    {
        return 1;
    }
}