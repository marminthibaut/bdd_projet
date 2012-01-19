    /**
     * @ORM\ManyToOne(targetEntity="Concept",inversedBy="concepts_specifiques")
     */
    private $concept_general;

    /**
     * @ORM\OneToMany(targetEntity="Concept",mappedBy="concept_general")
     */
    private $concepts_specifiques;
