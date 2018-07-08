<?php


namespace App\Controller\Page;


use App\Controller\BaseController;
use App\Entity\Page;
use App\Form\PageType;
use App\Service\FileUploader;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PageEditController extends BaseController
{
    public function edit($slug, $locale, Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $page = $this->getDoctrine()->getRepository(Page::class)->findOneBy(['slug' => $slug, 'locale' => $locale]);
        if (empty($page)) {
            throw new HttpException(404, $localization->translate('Could not find requested page'));
        }

        $form = $this->createForm(PageType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $data = $form->getData();

                if (!empty($data['slide_image']) && $data['slide_image'] instanceof UploadedFile) {
                    $data['slide_image'] = $fileUploader->upload($data['slide_image']);
                } else {
                    unset($data['slide_image']);
                }

                if (!empty($data['header']) && $data['header'] instanceof UploadedFile) {
                    $data['header'] = $fileUploader->upload($data['header']);
                } else {
                    unset($data['header']);
                }

                if (!empty($data['footer']) && $data['footer'] instanceof UploadedFile) {
                    $data['footer'] = $fileUploader->upload($data['footer']);
                } else {
                    unset($data['footer']);
                }

                if (!empty($data['call_to_action']) && $data['call_to_action'] instanceof UploadedFile) {
                    $data['call_to_action'] = $fileUploader->upload($data['call_to_action']);
                } else {
                    unset($data['call_to_action']);
                }

                $page->edit($data);
                $this->save($page);
                $this->addFlash('success', $localization->translate('Page was edited successfully'));
                return $localization->redirectToLocalizedRoute('admin_page_edit', ['slug' => $page->getSlug(), 'locale' => $page->getLocale()]);
            } else {
                $this->addFlash('error', $localization->translate('Failed to edit page'));
            }
        }

        return $this->render(
            'admin/page/page-edit.twig',
            [
                'form' => $form->createView(),
                'page' => $page,
            ]
        );
    }
}
