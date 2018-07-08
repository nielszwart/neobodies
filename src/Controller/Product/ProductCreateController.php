<?php


namespace App\Controller\Product;


use App\Controller\BaseController;
use App\Entity\Product;
use App\Form\ProductType;
use App\Service\FileUploader;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class ProductCreateController extends BaseController
{
    public function create(Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $image = $product->getImage();
                if (!empty($image) && $image instanceof UploadedFile) {
                    $product->setImage($fileUploader->upload($image));
                }
                $ebook = $product->getEbook();
                if (!empty($ebook) && $ebook instanceof UploadedFile) {
                    $product->setEbook($fileUploader->upload($ebook));
                }
                $video = $product->getVideo();
                if (!empty($video) && $video instanceof UploadedFile) {
                    $product->setVideo($fileUploader->upload($video));
                }

                $this->save($product);
                $this->addFlash('success', $localization->translate('Product was edited successfully'));
                return $localization->redirectToLocalizedRoute('admin_product_edit', ['id' => $product->getId()]);
            } else {
                $this->addFlash('error', $localization->translate('Failed to edit product'));
            }
        }

        return $this->render(
            'admin/product/product-create.twig',
            [
                'form' => $form->createView(),
                'product' => $product,
            ]
        );
    }
}