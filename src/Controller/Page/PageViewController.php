<?php


namespace App\Controller\Page;


use App\Controller\BaseController;
use App\Entity\Expert;
use App\Entity\Page;
use App\Entity\Partner;
use App\Service\Localization;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PageViewController extends BaseController
{
    public function view($slug, Request $request, Localization $localization)
    {
        $page = $this->getDoctrine()->getRepository(Page::class)->findOneBy(['slug' => $slug, 'locale' => $request->getLocale()]);
        if (empty($page)) {
            throw new HttpException(404, $localization->translate('Could not find the page you are looking for'));
        }

        $partners = [];
        if ($page->getId() === 6) {
            $partners = $this->getDoctrine()->getRepository(Partner::class)->findBy(['locale' => $request->getLocale()]);
        }

        $xperts = [];
        if ($page->getId() === 4) {
            $xperts = $this->getDoctrine()->getRepository(Expert::class)->findBy(['locale' => $request->getLocale()]);
        }

        return $this->render(
            'website/page/page-view.twig',
            [
                'page' => $page,
                'partners' => $partners,
                'xperts' => $xperts,
            ]
        );
    }
}
