<?php

namespace Batis\CrowdsourcingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Batis\CrowdsourcingBundle\Entity\Job;
use Batis\CrowdsourcingBundle\Entity\Category;
use Batis\UserBundle\Entity\User;


class ProjectController extends Controller
{
	public function indexAction()
	{
		return $this->render('BatisCrowdsourcingBundle:Project:index.html.twig');
	}
	
    public function addAction()
    {
        return $this->render('BatisCrowdsourcingBundle:Project:post-job.html.twig');
    }

    public function viewAction($id)
    {
    	$job = new Job();
    	$job->setTitle('Développement d\'application web');
    	$job->setOverview("At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.");
    	$job->setAboutJob("At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.");
    	$job->setSkillsRequired('php , mysql , html5/css3');
    	$job->setBudget(500);
    	$job->setType('full-time');
    	$job->setImage('sensio-labs.gif');
    	$job->setUrl('http://www.sensio-labs.com/');
    	$job->setLocation('Paris, France');
    	$job->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
    	$job->setIsPublic(true);
    	$job->setIsActivated(true);
    	$job->setExpiresAt(new \DateTime('2016-10-10'));

    	$category_un = new Category();
    	$category_un->setName('Informatique');

    	$user = new User();
    	$user->setUsername('toto');
    	$user->setEmail('toto@mail.com');
    	$user->setPassword('tata');

    	$job->setCategory($category_un);
    	$job->setUser($user);	

    	return $this->render('BatisCrowdsourcingBundle:Project:job-detail.html.twig', array('job' => $job));
    }
}
