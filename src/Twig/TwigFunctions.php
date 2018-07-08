<?php

namespace App\Twig;

use App\Entity\Page;
use App\Service\Countries;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TwigFunctions extends \Twig_Extension
{
    private $request;
    private $locale = 'en';
    private $urlGenerator;
    private $container;

    public function __construct(RequestStack $requestStack, UrlGeneratorInterface $urlGenerator, ContainerInterface $container)
    {
        $this->request = $requestStack->getCurrentRequest();
        if (!empty($this->request)) {
            $this->locale = $this->request->getLocale();
        }
        $this->urlGenerator = $urlGenerator;
        $this->container = $container;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('getLocalizedRoute', [$this, 'getLocalizedRoute']),
            new \Twig_SimpleFunction('isLoggedIn', [$this, 'isLoggedIn']),
            new \Twig_SimpleFunction('getCountries', [$this, 'getCountries']),
            new \Twig_SimpleFunction('getPageSlugById', [$this, 'getPageSlugById']),
        ];
    }

    public function getLocalizedRoute($routeName, array $parameters = [], $absolute = 1)
    {
        try {
            $url = $this->urlGenerator->generate($routeName, $parameters, $absolute);
            return $url;
        } catch (\Exception $e) {
            //
        }

        return $this->urlGenerator->generate($routeName . "_" . $this->locale, $parameters, $absolute);
    }

    public function getCountries()
    {
        return Countries::getList($this->locale);
    }

    public function getPageSlugById($pageId)
    {
        $page = $this->container->get('doctrine')->getRepository(Page::class)->findOneBy(['id' => $pageId, 'locale' => $this->locale]);
        return $page->getSlug();
    }
}
