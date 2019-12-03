<?php


namespace App\Controller;


use App\Entity\ContentBlock;
use App\Service\Localization;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function save($entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
    }

    public function delete($entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();
    }

    public function checkLoggedInForShop(Localization $localization)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $this->addFlash('error', $localization->translate('You need to have an account and login to enter the shop'));
        }

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
    }

    public function getBlocks(array $ids, $locale)
    {
        $foundBlocks =  $this->getDoctrine()->getRepository(ContentBlock::class)->findby(['id' => $ids, 'locale' => $locale]);
        $blocks = [];
        foreach ($foundBlocks as $block) {
            $blocks[$block->getId()] = $block;
        }

        return $blocks;
    }
}
