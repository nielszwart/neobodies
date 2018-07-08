<?php


namespace App\Controller\Tool;


use App\Controller\BaseController;
use App\Entity\Tool;
use Symfony\Component\HttpFoundation\Request;

class ToolsViewController extends BaseController
{
    public function view(Request $request)
    {
        $tools = $this->getDoctrine()->getRepository(Tool::class)->findBy(['locale' => $request->getLocale()]);

        return $this->render(
            'website/tool/tools-view.twig',
            [
                'tools' => $tools,
            ]
        );
    }
}
