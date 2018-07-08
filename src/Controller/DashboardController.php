<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController extends BaseController
{
    public function dashboard()
    {
        return $this->render(
            'admin/dashboard.twig',
            [

            ]
        );
    }
}