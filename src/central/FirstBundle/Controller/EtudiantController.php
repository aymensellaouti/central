<?php

namespace central\FirstBundle\Controller;

use central\FirstBundle\Entity\Etudiant;
use central\FirstBundle\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtudiantController extends Controller
{
    public function addAction()
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class,$etudiant);

        return $this->render('@centralFirst/Etudiant/addEtudiant.html.twig', array(
            'form' => $form->createView())
        );
    }
}
