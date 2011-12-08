<?php

namespace ProjetBDD\Thesaurus\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjetBDD\Thesaurus\Bundle\Entity\Terme
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProjetBDD\Thesaurus\Bundle\Entity\TermeRepository")
 */
class Terme
{
    /**
     * @var integer $id
     * @ORM\OneToMany(targetEntity="Concept",mappedBy="terme_vedette")
     * @ORM\Column(name="id", type="string", length="255")
     * @ORM\Id
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function __toString() { return $this->id; }
}
