<?php

namespace ProjetBDD\Thesaurus\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjetBDD\Thesaurus\Bundle\Entity\Terme
 *
 * @ORM\Table(indexes={@ORM\index(name="libterme_idx",columns={"libelle"})})
 * @ORM\Entity(repositoryClass="ProjetBDD\Thesaurus\Bundle\Entity\TermeRepository")
 */
class Terme
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
     * @var string $libelle
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;


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
     * Set libelle
     *
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    public function __toString() { return $this->libelle; }
}
