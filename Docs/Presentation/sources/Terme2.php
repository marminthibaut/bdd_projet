    /**
     * @var string $id
     * @ORM\OneToMany(targetEntity="Concept",mappedBy="terme_vedette")
     * @ORM\Column(name="id", type="string", length="255")
     * @ORM\Id
     */
    private $id;
