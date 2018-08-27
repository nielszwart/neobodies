<?php


namespace App\Controller\Expert;


use App\Controller\BaseController;
use App\Entity\Expert;

class ExpertOverviewController extends BaseController
{
    public function overview()
    {
        $experts = $this->getDoctrine()->getRepository(Expert::class)->findAll();

        return $this->render(
            'admin/expert/expert-overview.twig',
            [
                'experts' => $experts,
            ]
        );
    }
}
