<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EventsCommetns
 *
 * @ORM\Table(name="events_commetns")
 * @ORM\Entity
 */
class EventsCommetns
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idComment", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcomment;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="contentComment", type="text", nullable=false)
     */
    private $contentcomment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetimeComment", type="datetime", nullable=false)
     */
    private $datetimecomment;


}
