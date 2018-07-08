<?php

namespace App\Listeners;

use \Symfony\Component\HttpKernel\Event\GetResponseEvent;
use \Symfony\Component\HttpKernel\KernelEvents;
use \Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LocaleListener implements EventSubscriberInterface
{
    protected $domainLocales;
    protected $defaultLocale;

    public function __construct($domainLocales, $defaultLocale)
    {
        $this->domainLocales = $domainLocales;
        $this->defaultLocale = $defaultLocale;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $host = $request->getHost();
        $locale = $this->defaultLocale;

        if (array_key_exists($host, $this->domainLocales)) {
            $locale = $this->domainLocales[$host];
        }

        $request->setLocale($locale);
    }

    static public function getSubscribedEvents()
    {
        return [
            // must be registered before the default Locale listener
            KernelEvents::REQUEST => [['onKernelRequest', 17]],
        ];
    }
}