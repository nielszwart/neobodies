<?php


namespace App\Controller\ContentBlock;


use App\Controller\BaseController;
use App\Entity\ContentBlock;

class ContentBlockOverviewController extends BaseController
{
    public function overview()
    {
        $blocks = $this->getDoctrine()->getRepository(ContentBlock::class)->findAll();

        return $this->render(
            'admin/content-block/content-block-overview.twig',
            [
                'blocks' => $blocks,
            ]
        );
    }
}
