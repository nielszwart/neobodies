<?php


namespace App\Controller\Tool;


use App\Controller\BaseController;
use App\Entity\Tool;

class ToolOverviewController extends BaseController
{
    public function overview()
    {
        $tools = $this->getDoctrine()->getRepository(Tool::class)->findAll();

        return $this->render(
            'admin/tool/tool-overview.twig',
            [
                'tools' => $tools,
            ]
        );
    }
}
