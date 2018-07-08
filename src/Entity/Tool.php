<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Tool
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
    private $title;

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
     * @ORM\Column(type="string", nullable=true)
     */
    private $file;

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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
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

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
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
        if (isset($values['title'])) {
            $this->setTitle($values['title']);
        }
        if (isset($values['image'])) {
            $this->setImage($values['image']);
        }
        if (isset($values['link'])) {
            $this->setLink($values['link']);
        }
        if (isset($values['file'])) {
            $this->setFile($values['file']);
        }
        if (isset($values['new_tab'])) {
            $this->setNewTab($values['new_tab']);
        }
    }
}
