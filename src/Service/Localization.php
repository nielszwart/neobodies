<?php


namespace App\Service;


use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Translation\TranslatorInterface;

class Localization
{
    protected $translator;
    protected $urlGenerator;
    protected $request;
    protected $locale = 'en';

    public function __construct(UrlGeneratorInterface $urlGenerator, RequestStack $request, TranslatorInterface $translator)
    {
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
        $this->request = $request->getCurrentRequest();
        if (!empty($this->request)) {
            $this->locale = $this->request->getLocale();
        }
    }

    public function getLocalizedRoute($route, array $parameters = [])
    {
        try {
            $url = $this->urlGenerator->generate($route, $parameters);
            return $url;
        } catch (\Exception $e) {
            return $this->urlGenerator->generate($route . "_" . $this->locale, $parameters);
        }
    }

    public function redirectToLocalizedRoute($route, array $parameters = array(), $status = 302)
    {
        return new RedirectResponse($this->getLocalizedRoute($route, $parameters), $status);
    }

    public function translate($text)
    {
        return $this->translator->trans($text);
    }

    public function getLocale()
    {
        return $this->locale;
    }
}