<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="nameUser", columns={"nameUser"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="nameUser", type="string", length=255, nullable=false)
     */
    private $nameuser;

    /**
     * @var string
     *
     * @ORM\Column(name="passUser", type="string", length=255, nullable=false)
     */
    private $passuser;

    /**
     * @var string
     *
     * @ORM\Column(name="mailUser", type="string", length=255, nullable=false)
     */
    private $mailuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="IPadress", type="string", length=255, nullable=false)
     */
    private $ipadress;


}
