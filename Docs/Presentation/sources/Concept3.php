    /**
     * @ORM\ManyToOne(targetEntity="Terme", inversedBy="id")
     * @Assert\NotBlank()
     */
    private $terme_vedette;
