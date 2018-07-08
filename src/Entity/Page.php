<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Page
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
    private $slug;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $slide = false;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $slide_title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $slide_text;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $button_text;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $slide_image;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $header;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $footer;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $call_to_action;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $call_to_action_link;

    public function __construct($id, $locale) {
        $this->id = $id;
        $this->locale = $locale;
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

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
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

    public function getSlide()
    {
        return $this->slide;
    }

    public function setSlide($slide)
    {
        $this->slide = $slide;
    }

    public function getSlideTitle()
    {
        return $this->slide_title;
    }

    public function setSlideTitle($slide_title)
    {
        $this->slide_title = $slide_title;
    }

    public function getSlideText()
    {
        return $this->slide_text;
    }

    public function setSlideText($slide_text)
    {
        $this->slide_text = $slide_text;
    }

    public function getButtonText()
    {
        return $this->button_text;
    }

    public function setButtonText($button_text)
    {
        $this->button_text = $button_text;
    }

    public function getSlideImage()
    {
        return $this->slide_image;
    }

    public function setSlideImage($slide_image)
    {
        $this->slide_image = $slide_image;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setHeader($header)
    {
        $this->header = $header;
    }

    public function getFooter()
    {
        return $this->footer;
    }

    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    public function getCallToAction()
    {
        return $this->call_to_action;
    }

    public function setCallToAction($call_to_action)
    {
        $this->call_to_action = $call_to_action;
    }

    public function getCallToActionLink()
    {
        return $this->call_to_action_link;
    }

    public function setCallToActionLink($call_to_action_link)
    {
        $this->call_to_action_link = $call_to_action_link;
    }

    public function edit($values)
    {
        if (isset($values['content'])) {
            $this->setContent($values['content']);
        }
        if (isset($values['slug'])) {
            $this->setSlug($values['slug']);
        }
        if (isset($values['title'])) {
            $this->setTitle($values['title']);
        }
        if (isset($values['slide'])) {
            $this->setSlide($values['slide']);
        }
        if (isset($values['slide_title'])) {
            $this->setSlideTitle($values['slide_title']);
        }
        if (isset($values['slide_text'])) {
            $this->setSlideText($values['slide_text']);
        }
        if (isset($values['button_text'])) {
            $this->setButtonText($values['button_text']);
        }
        if (isset($values['slide_image'])) {
            $this->setSlideImage($values['slide_image']);
        }
        if (isset($values['header'])) {
            $this->setHeader($values['header']);
        }
        if (isset($values['footer'])) {
            $this->setFooter($values['footer']);
        }
        if (isset($values['call_to_action'])) {
            $this->setCallToAction($values['call_to_action']);
        }
        if (isset($values['call_to_action_link'])) {
            $this->setCallToActionLink($values['call_to_action_link']);
        }
    }
}
