<?php


namespace App\Controller\ContentBlock;


use App\Controller\BaseController;
use App\Entity\ContentBlock;
use App\Form\ContentBlockType;
use App\Service\FileUploader;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ContentBlockEditController extends BaseController
{
    public function edit($id, $locale, Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $block = $this->getDoctrine()->getRepository(ContentBlock::class)->findOneBy(['id' => $id, 'locale' => $locale]);
        if (empty($block)) {
            throw new HttpException(404, $localization->translate('Could not find requested content block'));
        }

        $form = $this->createForm(ContentBlockType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $data = $form->getData();

                if (!empty($data['image']) && $data['image'] instanceof UploadedFile) {
                    $data['image'] = $fileUploader->upload($data['image']);
                } else {
                    unset($data['image']);
                }

                if (!empty($data['link']) && strpos($data['link'], 'www') === 0) {
                    $data['link'] = 'http://' . $data['link'];
                }

                $block->edit($data);
                $this->save($block);
                $this->addFlash('success', $localization->translate('Content block was edited successfully'));
                return $localization->redirectToLocalizedRoute('admin_content_block_edit', ['id' => $block->getId(), 'locale' => $block->getLocale()]);
            } else {
                $this->addFlash('error', $localization->translate('Failed to edit content block'));
            }
        }

        return $this->render(
            'admin/content-block/content-block-edit.twig',
            [
                'form' => $form->createView(),
                'block' => $block,
            ]
        );
    }

    public function deleteFile($id, $locale, Localization $localization)
    {
        $block = $this->getDoctrine()->getRepository(ContentBlock::class)->findOneBy(['id' => $id, 'locale' => $locale]);
        if (empty($block)) {
            throw new HttpException(404, $localization->translate('Could not find requested content block'));
        }

        $block->setImage(null);
        $this->save($block);
        $this->addFlash('success', $localization->translate('Image was removed successfully'));

        return $localization->redirectToLocalizedRoute('admin_content_block_edit', ['id' => $block->getId(), 'locale' => $block->getLocale()]);
    }
}
