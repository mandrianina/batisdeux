<?php

namespace Batis\CrowdsourcingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Batis\CrowdsourcingBundle\Entity\Job;
use Batis\CrowdsourcingBundle\Entity\Category;
use Batis\CrowdsourcingBundle\Entity\Application;
use Batis\UserBundle\Entity\User;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Batis\CrowdsourcingBundle\Form\JobType;
use Batis\CrowdsourcingBundle\Form\ApplicationType;

class ProjectController extends Controller
{
	public function indexAction()
	{
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('BatisCrowdsourcingBundle:Category')->findAll();

        $recentsJob = $em->getRepository('BatisCrowdsourcingBundle:Job')->getRecentJob(null, $max = 5);

		return $this->render('BatisCrowdsourcingBundle:Project:index.html.twig', array(
            'recentJob' => $recentsJob,
            'categories' => $categories

        ));
	}
	
    public function addAction(Request $request)
    {
        $job = new Job();
        $em = $this->getDoctrine()->getManager();
        $utilisateur= $this->container->get('security.context')->getToken()->getUser();

        $job->setUser($utilisateur);
        $form = $this->createForm(JobType::class, $job);

        $slug = $this->get('batis_crowdsourcing.slugify');

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $job->setToken('0');
                $em->persist($job);
                $em->flush();
                $session = $this->getRequest()->getSession();
                $session->getFlashBag()->add('info', 'L\'annonce a bien été posté');
                return $this->redirectToRoute('batis_crowdsourcing_myjob');
            }
        }

        $activeJobs = $em->getRepository('BatisCrowdsourcingBundle:Job')->getActiveJobs(23);

        return $this->render('BatisCrowdsourcingBundle:Project:post-job.html.twig',array('form' => $form->createView()));
    }

    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $currentJob = $em->getRepository('BatisCrowdsourcingBundle:Job')->find($id);

        if(!$currentJob)
        {
            throw new NotFoundHttpException('L\'annonce d\'id ' .$id .' n\'existe pas . ');

        }
        $applications = $em->getRepository('BatisCrowdsourcingBundle:Application')->findByJob($currentJob);

    	return $this->render('BatisCrowdsourcingBundle:Project:job-detail.html.twig',
                                                                     array('job' => $currentJob,
                                                                           'applications' => $applications
                                                                     ));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $job = $em->getRepository('BatisCrowdsourcingBundle:Job')->find($id);

        if (null === $job)
        {
            throw new NotFoundHttpException("L'annonce d'id ". $id . " n'existe pas ou a été effacée");
            
        }
        $form = $this->createForm(JobType::class, $job);

        $slug = $this->get('batis_crowdsourcing.slugify');

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $em->persist($job);
                $em->flush();
                $session = $this->getRequest()->getSession();
                $session->getFlashBag()->add('info', 'L\'annonce a bien été modifiée');
                return $this->redirectToRoute('batis_crowdsourcing_myjob');
            }
        }

        $activeJobs = $em->getRepository('BatisCrowdsourcingBundle:Job')->getActiveJobs(23);

        return $this->render('BatisCrowdsourcingBundle:Project:post-job.html.twig',array('form' => $form->createView()));
    }
    public function searchAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('BatisCrowdsourcingBundle:Category')->findAll();

        return $this->render('BatisCrowdsourcingBundle:Project:search-job.html.twig', array('categories' => $categories));
    }

    public function categoryAction($id)
    {   
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('BatisCrowdsourcingBundle:Category')->find($id);
        $jobs = $em->getRepository('BatisCrowdsourcingBundle:Job')->findBy(array('category' => $id));

        if (!$jobs)
        {
             throw new NotFoundHttpException("Cette annonce n'existe pas");
        }  
    
        return $this->render('BatisCrowdsourcingBundle:Project:category-job.html.twig', 
                                                                        array('jobs' => $jobs,
                                                                              'category' => $category));
    }

    public function myjobAction()
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur= $this->container->get('security.context')->getToken()->getUser();

        $jobs = $em->getRepository('BatisCrowdsourcingBundle:Job')->findBy(array('user' => $utilisateur));

        return $this->render('BatisCrowdsourcingBundle:Project:my-job.html.twig', array('jobs' => $jobs));
    }

    public function myapplicationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur= $this->container->get('security.context')->getToken()->getUser();
        $jobs = array();

        $applications = $em->getRepository('BatisCrowdsourcingBundle:Application')->findBy(array('user' => $utilisateur));

        $jobRepository = $em->getRepository('BatisCrowdsourcingBundle:Job');
        foreach ($applications as $application) {
            $jobs[] = $jobRepository->findOneBy(array('id' => $application->getJob()->getId()));
        }

        return $this->render('BatisCrowdsourcingBundle:Project:my-job.html.twig', array('jobs' => $jobs));
    }

    public function applytoAction(Request $request,$id)
    {
        $application = new Application();

        $em = $this->getDoctrine()->getManager();
        $job = $em->getRepository('BatisCrowdsourcingBundle:Job')->find($id);
        $utilisateur= $this->container->get('security.context')->getToken()->getUser();

        if(!$job)
        {
            throw new NotFoundHttpException("Oh , on ne peut pas effectuer un travail qui n'existe pas");
            
        }

        $application->setJob($job);
        $application->setUser($utilisateur);
        $form = $this->createForm(ApplicationType::class, $application);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $em->persist($application);
                $em->flush();

                return $this->redirectToRoute('batis_crowdsourcing_myapplication');
            }
        }

        return $this->render('BatisCrowdsourcingBundle:Project:apply-to.html.twig', array('form' => $form->createView()));
    }

}
