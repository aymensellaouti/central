<?php

namespace central\FirstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="central\FirstBundle\Repository\EtudiantRepository")
 */
class Etudiant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=50)
     */
    private $path;

    /**
     * @ORM\ManyToOne(targetEntity="central\FirstBundle\Entity\Section")
     */
    private $section;

    /**
     * @ORM\OneToOne(targetEntity="central\FirstBundle\Entity\Cin",cascade={"persist"})
     */
    private $cin;

    /**
     * @ORM\ManyToMany(targetEntity="central\FirstBundle\Entity\Matiere")
     */
    private $matieres;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Etudiant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Etudiant
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->matieres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set section
     *
     * @param \central\FirstBundle\Entity\Section $section
     *
     * @return Etudiant
     */
    public function setSection(\central\FirstBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \central\FirstBundle\Entity\Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set cin
     *
     * @param \central\FirstBundle\Entity\Cin $cin
     *
     * @return Etudiant
     */
    public function setCin(\central\FirstBundle\Entity\Cin $cin = null)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return \central\FirstBundle\Entity\Cin
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Add matiere
     *
     * @param \central\FirstBundle\Entity\Matiere $matiere
     *
     * @return Etudiant
     */
    public function addMatiere(\central\FirstBundle\Entity\Matiere $matiere)
    {
        $this->matieres[] = $matiere;

        return $this;
    }

    /**
     * Remove matiere
     *
     * @param \central\FirstBundle\Entity\Matiere $matiere
     */
    public function removeMatiere(\central\FirstBundle\Entity\Matiere $matiere)
    {
        $this->matieres->removeElement($matiere);
    }

    /**
     * Get matieres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatieres()
    {
        return $this->matieres;
    }
}
