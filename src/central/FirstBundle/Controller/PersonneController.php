<?php

namespace central\FirstBundle\Controller;

use central\FirstBundle\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PersonneController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('centralFirstBundle:Personne');
        $personnes = $repo->findAll();

        return $this->render('@centralFirst/Personne/list.html.twig',array(
            'personnes'=>$personnes
        )
        );
    }

    public function addAction(Request $request, $nom, $prenom, $age){
        //Recupérer la Entity Manager
        $session=$request->getSession();
        $em = $this->getDoctrine()->getManager();
        $personne = new Personne();
        $personne->setAge($age);
        $personne->setNom($nom);
        $personne->setPrenom($prenom);
        $messageSucces = $prenom.' '.$nom.' a été ajouté avec succées';
        $em->persist($personne);
        $em->flush();
        $session->getFlashBag()->add('success',$messageSucces);


        return $this->forward('centralFirstBundle:Personne:index');
    }

    public function onePersonneAction(Personne $personne=null){
        return $this->render('@centralFirst/Personne/details.html.twig',array(
            'personne'=>$personne
        ));
    }

    public function updatePersonneAction(Request $request, Personne $personne=null, $nom=null, $prenom=null, $age=null){
        $session=$request->getSession();
        // si personne existe
        if($personne) {
            $em = $this->getDoctrine()->getManager();
            // je met a jour la personne
            $personne->setNom($nom);
            $personne->setPrenom($prenom);
            $personne->setAge($age);
            // Success Message
            $messageSucces = $prenom.' '.$nom.' a été mis à jour avec succées';
            $session->getFlashBag()->add('success', $messageSucces);
            // insérer dans la base
            $em->flush();
        }
        //Sinon
        else{
            // Error Message
            $session->getFlashBag()->add('error', 'personne not found');
        }
        return $this->forward('centralFirstBundle:Personne:index');
    }

    public function deletePersonneAction(Request $request, Personne $personne=null){
        $session=$request->getSession();
        // si personne existe
        if($personne) {
            $em = $this->getDoctrine()->getManager();
            // Success Message
            $messageSucces = $personne->getNom().' '.$personne->getPrenom().'a été supprimé avec succées';
            $session->getFlashBag()->add('success', $messageSucces);
            // insérer dans la base
            $em->remove($personne);
            $em->flush();
        }
        //Sinon
        else{
            // Error Message
            $session->getFlashBag()->add('error', 'personne not found');
        }
        return $this->forward('centralFirstBundle:Personne:index');
    }
}
