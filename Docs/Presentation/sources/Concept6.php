    /**
     * @ORM\ManyToMany(targetEntity="Concept", mappedBy="associations")
     */
    private $associes_avec_moi;
    /**
     * @ORM\ManyToMany(targetEntity="Concept", inversedBy="associes_avec_moi")
     * @ORM\JoinTable(name="concept_concept",
     * joinColumns={@ORM\JoinColumn(name="concept1_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="concept2_id", referencedColumnName="id")})
     */
    private $associations;
