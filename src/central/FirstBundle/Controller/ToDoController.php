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

    public function addAction(Request $request, $cle, $valeur){
        //Recupérer la session
         $session = $request->getSession();
        //Si nelle session
        if(!$session->has('mesTodos')){
            // error
            // forward
            $session->getFlashBag()->add('error','Session innexistante !!!!');
        }else{
            $todos = $session->get('mesTodos');
            //Si ok
            // si exist
            if(isset($todos[$cle])){
                $session->getFlashBag()->add('error','Todo existant !!!!');
                // error
                // forward
            }else{
                // si  exist on ajoute
                $todos[$cle]=$valeur;
                $session->set('mesTodos',$todos);
                $messageSucces = 'Le Todo '.$cle.' de valeur '.$valeur.' a été ajouté avec succées';
                $session->getFlashBag()->add('success',$messageSucces);
            }
        }
        return $this->forward('centralFirstBundle:ToDo:index');
    }
    public function updateAction(Request $request, $cle, $valeur){
        //Recupérer la session
        $session = $request->getSession();
        //Si nelle session
        if(!$session->has('mesTodos')){
            // error
            // forward
            $session->getFlashBag()->add('error','Session innexistante !!!!');
        }else{
            $todos = $session->get('mesTodos');
            //Si ok
            // si exist
            if(!isset($todos[$cle])){
                $session->getFlashBag()->add('error','Todo innexistant !!!!');
                // error
                // forward
            }else{
                // si  exist on ajoute
                $todos[$cle]=$valeur;
                $session->set('mesTodos',$todos);
                $messageSucces = 'Le Todo '.$cle.' de valeur '.$valeur.' a été modifié avec succées';
                $session->getFlashBag()->add('success',$messageSucces);
            }
        }
        return $this->forward('centralFirstBundle:ToDo:index');
    }
    public function deleteAction(Request $request, $cle){
        //Recupérer la session
        $session = $request->getSession();
        //Si nelle session
        if(!$session->has('mesTodos')){
            // error
            // forward
            $session->getFlashBag()->add('error','Session innexistante !!!!');
        }else{
            $todos = $session->get('mesTodos');
            //Si ok
            // si exist
            if(!isset($todos[$cle])){
                $session->getFlashBag()->add('error','Todo innexistant !!!!');
                // error
                // forward
            }else{
                // si  exist on supprime
                unset($todos[$cle]);
                $session->set('mesTodos',$todos);
                $messageSucces = 'Le Todo '.$cle.' a été supprimé avec succées';
                $session->getFlashBag()->add('success',$messageSucces);
            }
        }
        return $this->forward('centralFirstBundle:ToDo:index');

    }
}