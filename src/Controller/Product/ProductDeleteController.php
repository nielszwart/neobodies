<?php


namespace App\Controller\Product;


use App\Controller\BaseController;
use App\Entity\Product;
use App\Service\Localization;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductDeleteController extends BaseController
{
    public function deleteProduct($id, Localization $localization)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        if (empty($product)) {
            throw new HttpException(404, $localization->translate('Could not find requested product'));
        }

        $product->delete();
        $this->save($product);

        return $localization->redirectToLocalizedRoute('admin_product_overview');
    }
}
