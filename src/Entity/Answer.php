<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="answer")
 * @ORM\Entity()
 */
class Answer
{
    /**
     * @ORM\ManyToOne(targetEntity="Genblueprint", inversedBy="answers")
     * @ORM\Id
     */
    private $genblueprint;

    /**
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    private $question;

    /**
     * @ORM\Column(type="boolean")
     */
    private $green = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $blue = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $red = false;

    public function __construct(Genblueprint $genblueprint, $questionId, array $answers = [])
    {
        $this->genblueprint = $genblueprint;
        $this->question = $questionId;
        if (!empty($answers)) {
            $this->edit($answers);
        }
    }

    public function edit(array $answers)
    {
        $this->green = in_array('green', $answers) ? true : false;
        $this->blue = in_array('blue', $answers) ? true : false;
        $this->red = in_array('red', $answers) ? true : false;
    }

    public function getGenblueprint()
    {
        return $this->genblueprint;
    }

    public function setGenblueprint($genblueprint)
    {
        $this->genblueprint = $genblueprint;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function setGreen($green)
    {
        $this->green = $green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    public function setBlue($blue)
    {
        $this->blue = $blue;
    }

    public function getRed()
    {
        return $this->red;
    }

    public function setRed($red)
    {
        $this->red = $red;
    }
}