<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="genblueprint")
 * @ORM\Entity()
 */
class Genblueprint
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_changed;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="genblueprint")
     */
    private $answers;

    /**
     * @ORM\OneToOne(targetEntity="PhysicalTest", mappedBy="genblueprint")
     */
    private $physical_test;

    public function __construct()
    {
        $this->date_changed = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDateChanged()
    {
        if (!is_null($this->date_changed)) {
            return $this->date_changed->format('Y-m-d H:i:s');
        }
        return $this->date_changed;
    }

    public function setDateChanged($date_changed)
    {
        $this->date_changed = $date_changed;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function getPhysicalTest()
    {
        return $this->physical_test;
    }

    public function setPhysicalTest($physical_test)
    {
        $this->physical_test = $physical_test;
    }
}
