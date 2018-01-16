<?php

namespace central\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ToDoController extends Controller
{
    public function indexAction(Request $request)
    {
        // Le role de cette action est d'afficher la liste de Todo
        $session = $request->getSession();
        // Je vérifie si la session existe
        //Si non je dois initialiser la liste et l'insérer dans la session
        if(!$session->has('mesTodos')){
           $todos = array(
               'lundi'=>'Atelier Symfo de 8h à 16h',
               'mardi'=>'Meme atelier de 8h a 12h'
           );
            $session->set('mesTodos',$todos);
            //J'ajoute le flashbag
            $session->getFlashBag()->add('info','Session crée avec succées');
        }

        //Si oui ou non je dois afficher la liste
        return $this->render('@centralFirst/Todo/listTodo.html.twig');
    }
}