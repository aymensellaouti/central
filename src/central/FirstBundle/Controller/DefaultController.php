<?php

namespace central\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        // récupérer session
        $session = $request->getSession();
        $todos = array('aymen'=>'sellaouti',
                       'test'=>'test',
                       'ahmed'=>'wissem',
        );
        $session->set('todos',$todos);
        return $this->render('centralFirstBundle:Default:index.html.twig');
    }
    public function testAction($var)
    {
        return $this->render('centralFirstBundle:Test:index2.html.twig',
            array(
            'maVariable'=>$var
        ));
    }
}
