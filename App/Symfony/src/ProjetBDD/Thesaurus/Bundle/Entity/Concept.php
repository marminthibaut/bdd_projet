<?php

namespace ProjetBDD\Thesaurus\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * ProjetBDD\Thesaurus\Bundle\Entity\Concept
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProjetBDD\Thesaurus\Bundle\Entity\ConceptRepository")
 */
class Concept
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Terme")
     * @Assert\NotBlank()
     */
    private $terme_vedette;

    /**
     * @ORM\ManyToOne(targetEntity="Concept",inversedBy="concepts_specifiques")
     */
    private $concept_general;

    /**
     * @ORM\OneToMany(targetEntity="Concept",mappedBy="concept_general")
     */
    private $concepts_specifiques;

    /**
     * @ORM\ManyToMany(targetEntity="Terme")
     */
    private $synonymes;

    /**
     * @ORM\ManyToMany(targetEntity="Concept")
     */
    private $associations;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set terme_vedette
     *
     * @param object $termeVedette
     */
    public function setTermeVedette($termeVedette)
    {
        $this->terme_vedette = $termeVedette;
    }

    /**
     * Get terme_vedette
     *
     * @return object 
     */
    public function getTermeVedette()
    {
        return $this->terme_vedette;
    }

    /**
     * Set concept_general
     *
     * @param object $conceptGeneral
     */
    public function setConceptGeneral($conceptGeneral)
    {
        $this->concept_general = $conceptGeneral;
    }

    /**
     * Get concept_general
     *
     * @return object 
     */
    public function getConceptGeneral()
    {
        return $this->concept_general;
    }

    /**
     * Set concepts_specifiques
     *
     * @param object $conceptsSpecifiques
     */
    public function setConceptsSpecifiques($conceptsSpecifiques)
    {
        $this->concepts_specifiques = $concepsSpecifiques;
    }

    /**
     * Get concepts_specifiques
     *
     * @return object 
     */
    public function getConceptsSpecifiques()
    {
        return $this->concepts_specifiques;
    }

    /**
     * Set synonymes
     *
     * @param object $synonymes
     */
    public function setSynonymes($synonymes)
    {
        $this->synonymes = $synonymes;
    }

    /**
     * Get synonymes
     *
     * @return object 
     */
    public function getSynonymes()
    {
        return $this->synonymes;
    }

    /**
     * Set associations
     *
     * @param object $associations
     */
    public function setAssociations($associations)
    {
        $this->associations = $associations;
    }

    /**
     * Get associations
     *
     * @return object 
     */
    public function getAssociations()
    {
        return $this->associations;
    }

    public function __toString() { return '['.$this->id.'] '.$this->terme_vedette; }
}
