<?php


namespace App\Controller\Product;


use App\Controller\BaseController;
use App\Entity\Product;

class ProductOverviewController extends BaseController
{
    public function overview()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render(
            'admin/product/product-overview.twig',
            [
                'products' => $products,
            ]
        );
    }
}
