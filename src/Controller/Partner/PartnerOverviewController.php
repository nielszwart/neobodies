<?php


namespace App\Controller\Partner;


use App\Controller\BaseController;
use App\Entity\Partner;

class PartnerOverviewController extends BaseController
{
    public function overview()
    {
        $partners = $this->getDoctrine()->getRepository(Partner::class)->findAll();

        return $this->render(
            'admin/partner/partner-overview.twig',
            [
                'partners' => $partners,
            ]
        );
    }
}
