<?php


namespace App\Service;


use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Hostnames
{
    protected $env;
    protected $locale = 'en';

    public function __construct($env, RequestStack $requestStack)
    {
        $this->env = $env;
        $request = $requestStack->getCurrentRequest();
        if (!empty($request)) {
            $this->locale = $request->getLocale();
        }
    }

    public function getAdminUrl()
    {
        switch ($this->env) {
            case 'dev':
                $host = 'http://www.neobodies.nl/admin';
                break;
            case 'prod':
                $host = 'https://www.neobodies.nl/admin';
                break;
            default:
                throw new HttpException(500, 'No environment given');
        }

        return $host;
    }

    public function getWebsiteUrl()
    {
        switch ($this->env) {
            case 'dev':
                $host = 'http://www.neobodies.eu';
                if ($this->locale === 'nl') {
                    $host = 'http://www.neobodies.nl';
                }
                break;
            case 'prod':
                $host = 'https://www.neobodies.eu';
                if ($this->locale === 'nl') {
                    $host = 'https://www.neobodies.nl';
                }
                break;
            default:
                throw new HttpException(500, 'No environment given');
        }

        return $host;
    }
}
