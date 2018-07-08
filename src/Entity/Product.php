<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $ebook;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $video;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_genblueprint = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_clothing = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getEbook()
    {
        return $this->ebook;
    }

    public function setEbook($ebook)
    {
        $this->ebook = $ebook;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video)
    {
        $this->video = $video;
    }

    public function getHasGenblueprint()
    {
        return $this->has_genblueprint;
    }

    public function setHasGenblueprint($has_genblueprint)
    {
        $this->has_genblueprint = $has_genblueprint;
    }

    public function getIsClothing()
    {
        return $this->is_clothing;
    }

    public function setIsClothing($is_clothing)
    {
        $this->is_clothing = $is_clothing;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    public function delete()
    {
        $this->deleted = true;
    }
}
