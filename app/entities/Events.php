<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events", indexes={@ORM\Index(name="events", columns={"idUser"})})
 * @ORM\Entity
 */
class Events
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEvent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevent;

    /**
     * @var string
     *
     * @ORM\Column(name="titleEvent", type="string", length=255, nullable=false)
     */
    private $titleevent;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionEvent", type="text", nullable=false)
     */
    private $descriptionevent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startEvent", type="datetime", nullable=false)
     */
    private $startevent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endEvent", type="datetime", nullable=false)
     */
    private $endevent;

    /**
     * @var string
     *
     * @ORM\Column(name="addressEvent", type="string", length=255, nullable=false)
     */
    private $addressevent;

    /**
     * @var integer
     *
     * @ORM\Column(name="creatorEvent", type="integer", nullable=false)
     */
    private $creatorevent;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;


}
