<?php

namespace central\FirstBundle\Controller;

use central\FirstBundle\Entity\Etudiant;
use central\FirstBundle\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtudiantController extends Controller
{
    public function addAction(Request $request)
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();
            return $this->render('@centralFirst/Etudiant/list.html.twig',array(
                'etudiant'=>$etudiant
            ));
        }else
        return $this->render('@centralFirst/Etudiant/addEtudiant.html.twig', array(
            'form' => $form->createView())
        );
    }
}
