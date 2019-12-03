<?php


namespace App\Controller;


use App\Entity\ContentBlock;
use App\Entity\Page;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends BaseController
{
    public function homepage(Request $request)
    {
        $locale = $request->getLocale();
        $pages = $this->getDoctrine()->getRepository(Page::class)->findBy([
            'locale' => $locale,
            'slide' => true,
        ]);

        return $this->render('website/homepage.twig', array(
            'pages' => $pages,
            'blocks' => $this->getBlocks([1,2,3,4,5,6], $locale),
        ));
    }
}
