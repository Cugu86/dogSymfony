<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingRepository")
 */
class Booking
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
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="bookings")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bookings")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="Dog", inversedBy="bookings")
     * @ORM\JoinColumn(name="dog_id", referencedColumnName="id")
     */
    public $dogs;


    /**
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="bookings")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     */
    private $service;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bookingDate", type="datetime")
     */
    private $bookingDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bookingTime", type="datetime")
     */
    private $bookingTime;

    /*
     * @var string
     *
     * @ORM\Column(name="bookingComments", type="text")
     */
    private $bookingComments;


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
     * Set bookingDate
     *
     * @param \DateTime $bookingDate
     *
     * @return Booking
     */
    public function setBookingDate($bookingDate)
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    /**
     * Get bookingDate
     *
     * @return \DateTime
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * Set bookingTime
     *
     * @param \DateTime $bookingTime
     *
     * @return Booking
     */
    public function setBookingTime($bookingTime)
    {
        $this->bookingTime = $bookingTime;

        return $this;
    }

    /**
     * Get bookingTime
     *
     * @return \DateTime
     */
    public function getBookingTime()
    {
        return $this->bookingTime;
    }

    /**
     * Set bookingComments
     *
     * @param string $bookingComments
     *
     * @return Booking
     */
    public function setBookingComments($bookingComments)
    {
        $this->bookingComments = $bookingComments;

        return $this;
    }

    /**
     * Get bookingComments
     *
     * @return string
     */
    public function getBookingComments()
    {
        return $this->bookingComments;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return Booking
     */
    public function setStatus(\AppBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\User $users
     *
     * @return Booking
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
     * Set dogs
     *
     * @param \AppBundle\Entity\Dog $dogs
     *
     * @return Booking
     */
    public function setDogs(\AppBundle\Entity\Dog $dogs = null)
    {
        $this->dogs = $dogs;

        return $this;
    }

    public function __toString()
    {
        return $this->dogs;
    }

    /**
     * Get dogs
     *
     * @return \AppBundle\Entity\Dog
     */
    public function getDogs()
    {
        return $this->dogs;
    }
    

    /**
     * Set service
     *
     * @param \AppBundle\Entity\Service $service
     *
     * @return Booking
     */
    public function setService(\AppBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \AppBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }
}
