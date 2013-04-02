<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Cookie;
use Acme\DemoBundle\Entity\User;
use Acme\DemoBundle\Form\First;
use Acme\DemoBundle\Form\Second;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        if ($request->cookies->get('symfony_user_registration')) {
            return new RedirectResponse($this->generateUrl('two'));
        }

        $form = $this->createForm(new First(), new User);

        if ($request->isXmlHttpRequest()) {

            $form->bind($request);
            $user = $form->getData();
            //var_dump($user);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $success = true;
                //$cookie = new Cookie();
                //$this->get('response')->setCookie('symfony_user_registration', $user->getId());
                setcookie('symfony_user_registration', $user->getId());
            } else {
                $success = false;
            }

            $view = $this->render('AcmeDemoBundle:Index:index.html.twig', array(
                'form' => $form->createView(),
                'timer' => $this->getTimer()
            ));

            return new JsonResponse(array(
                'success' => $success,
                'view' => $view->getContent()
            ));
        }
        return array('form' => $form->createView(), 'timer' => $this->getTimer());
    }

    /**
     * @Route("/two", name="two")
     * @Template()
     */
    public function twoAction(Request $request)
    {
        if (!$request->cookies->get('symfony_user_registration')) {
            return new RedirectResponse($this->generateUrl('index'));
        }

        $id = $request->cookies->get('symfony_user_registration');
        $user = $this->getDoctrine()
            ->getRepository('AcmeDemoBundle:User')
            ->find($id);

        $user->setIceCream('');
        $user->setCar('');
        $user->setBook('');
        $user->setDate(new \DateTime());
        $user->setCountry('');

        $form = $this->createForm(new Second(), $user);

        if ($request->isXmlHttpRequest()) {
            $form->bind($request);
            $user = $form->getData();

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $success = true;
            } else {
                $success = false;
            }

            $view = $this->render('AcmeDemoBundle:Index:two.html.twig', array(
                'form' => $form->createView(),
                'timer' => $this->getTimer()
            ));

            return new JsonResponse(array(
                'success' => $success,
                'view' => $view->getContent()
            ));
        }

        return array('form' => $form->createView(), 'timer' => $this->getTimer());
    }

    /**
     * @Route("/three", name="three")
     * @Template()
     */
    public function threeAction()
    {
        $url = 'http://www.gifbin.com/random';
        $browser = $this->container->get('buzz');

        $html = $browser->get($url)->getContent();
        $crawler = new Crawler($html, $url);
        $random_gif = $crawler->filter('img.gif')->attr('src');

        return array('timer' => $this->getTimer(), 'random_gif' => $random_gif);
    }

    /**
     * @return mixed
     */
    private function getTimer()
    {
        $session = new Session();
        $session->start();

        if (!$session->get('timer')) {
            $session->set('timer', time());
        }

        return max(0, $session->get('timer') + 360 - time());
    }
}
