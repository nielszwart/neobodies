<?php


namespace App\Controller\Product;


use App\Controller\BaseController;
use App\Entity\Product;
use App\Form\ProductType;
use App\Service\FileUploader;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductEditController extends BaseController
{
    public function edit($id, Request $request, Localization $localization, FileUploader $fileUploader, SessionInterface $session)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        if (empty($product)) {
            throw new HttpException(404, $localization->translate('Could not find requested product'));
        }

        $params = array_merge($request->request->all(), $request->query->all());
        if (!empty($params['upload_token']) && $params['upload_token'] === 'video_upload') {
            $response = $fileUploader->chunkedUpload();
            if ($response) {
                if (is_int($response)) {
                    $product->setVideo($params['resumableFilename']);
                    $this->save($product);
                }
                return new Response();
            } else {
                return new Response('fail', 400);
            }
        }

        $originalImage = $product->getImage();
        if (!empty($originalImage)) {
            $product->setImage(
                new File($fileUploader->getTargetDir() . $originalImage)
            );
        }

        $originalEbook = $product->getEbook();
        if (!empty($originalEbook)) {
            $product->setEbook(
                new File($fileUploader->getTargetDir() . $originalEbook)
            );
        }

        $originalVideo = $product->getVideo();
        if (!empty($originalVideo)) {
            $product->setVideo(
                new File($fileUploader->getTargetDir() . $originalVideo)
            );
        }

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $image = $product->getImage();
                if (!empty($image) && $image instanceof UploadedFile) {
                    $product->setImage($fileUploader->upload($image));
                } else {
                    $product->setImage($originalImage);
                }

                $ebook = $product->getEbook();
                if (!empty($ebook) && $ebook instanceof UploadedFile) {
                    $product->setEbook($fileUploader->upload($ebook));
                } else {
                    $product->setEbook($originalEbook);
                }

                $video = $product->getVideo();
                if (!empty($video) && $video instanceof UploadedFile) {
                    $product->setVideo($fileUploader->upload($video));
                } else {
                    $product->setVideo($originalVideo);
                }

                $this->save($product);
                $this->addFlash('success', $localization->translate('Product was edited successfully'));
                return $localization->redirectToLocalizedRoute('admin_product_edit', ['id' => $product->getId()]);
            } else {
                $this->addFlash('error', $localization->translate('Failed to edit product'));
            }
        } else {
            if (!empty($product->getImage())) {
                $product->setImage($originalImage);
            }
            if (!empty($product->getEbook())) {
                $product->setEbook($originalEbook);
            }
            if (!empty($product->getVideo())) {
                $product->setVideo($originalVideo);
            }
        }

        return $this->render(
            'admin/product/product-edit.twig',
            [
                'form' => $form->createView(),
                'product' => $product,
            ]
        );
    }
}
