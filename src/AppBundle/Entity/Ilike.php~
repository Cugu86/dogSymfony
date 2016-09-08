<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ilike
 *
 * @ORM\Table(name="ilike")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IlikeRepository")
 */
class Ilike
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLike", type="datetime")
     */
    private $dateLike;


     /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="likes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="Photo", inversedBy="likes")
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    private $photos;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateLike
     *
     * @param \DateTime $dateLike
     *
     * @return Ilike
     */
    public function setDateLike($dateLike)
    {
        $this->dateLike = $dateLike;

        return $this;
    }

    /**
     * Get dateLike
     *
     * @return \DateTime
     */
    public function getDateLike()
    {
        return $this->dateLike;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\User $users
     *
     * @return Ilike
     */
    public function setUsers(\AppBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set photos
     *
     * @param \AppBundle\Entity\Photo $photos
     *
     * @return Ilike
     */
    public function setPhotos(\AppBundle\Entity\Photo $photos = null)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return \AppBundle\Entity\Photo
     */
    public function getPhotos()
    {
        return $this->photos;
    }
}
