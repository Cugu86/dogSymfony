<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Breed
 *
 * @ORM\Table(name="breed")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BreedRepository")
 */
class Breed
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\OneToMany(targetEntity="Dog", mappedBy="breeds")
     */
    private $dogs;

    /**
     * @var string
     *
     * @ORM\Column(name="breedName", type="string", length=255, unique=true)
     */
    private $breedName;

    /**
     * @var string
     *
     * @ORM\Column(name="breedDescription", type="text")
     */
    private $breedDescription;


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
     * Set breedName
     *
     * @param string $breedName
     *
     * @return Breed
     */
    public function setBreedName($breedName)
    {
        $this->breedName = $breedName;

        return $this;
    }

    /**
     * Get breedName
     *
     * @return string
     */
    public function getBreedName()
    {
        return $this->breedName;
    }

    /**
     * Set breedDescription
     *
     * @param string $breedDescription
     *
     * @return Breed
     */
    public function setBreedDescription($breedDescription)
    {
        $this->breedDescription = $breedDescription;

        return $this;
    }

    /**
     * Get breedDescription
     *
     * @return string
     */
    public function getBreedDescription()
    {
        return $this->breedDescription;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dog
     *
     * @param \AppBundle\Entity\Dog $dog
     *
     * @return Breed
     */
    public function addDog(\AppBundle\Entity\Dog $dog)
    {
        $this->dogs[] = $dog;

        return $this;
    }

    /**
     * Remove dog
     *
     * @param \AppBundle\Entity\Dog $dog
     */
    public function removeDog(\AppBundle\Entity\Dog $dog)
    {
        $this->dogs->removeElement($dog);
    }

    /**
     * Get dogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDogs()
    {
        return $this->dogs;
    }

      public function __toString()
    {
        return $this->getBreedName();
    } 
}
