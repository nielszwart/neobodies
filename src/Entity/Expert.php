<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Expert
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=10)
     */
    private $locale;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="boolean")
     */
    private $new_tab = false;


    public function __construct($locale)
    {
        $this->setLocale($locale);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getNewTab()
    {
        return $this->new_tab;
    }

    public function setNewTab($new_tab)
    {
        $this->new_tab = $new_tab;
    }

    public function edit($values)
    {
        if (isset($values['content'])) {
            $this->setContent($values['content']);
        }
        if (isset($values['name'])) {
            $this->setName($values['name']);
        }
        if (isset($values['image'])) {
            $this->setImage($values['image']);
        }
        if (isset($values['link'])) {
            $this->setLink($values['link']);
        }
        if (isset($values['new_tab'])) {
            $this->setNewTab($values['new_tab']);
        }
    }
}
