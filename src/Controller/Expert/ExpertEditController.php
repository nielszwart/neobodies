<?php


namespace App\Controller\Expert;


use App\Controller\BaseController;
use App\Entity\Expert;
use App\Service\FileUploader;
use App\Service\Localization;
use App\Form\ExpertType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ExpertEditController extends BaseController
{
    public function edit($id, $locale, Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $expert = $this->getDoctrine()->getRepository(Expert::class)->findOneBy(['id' => $id, 'locale' => $locale]);
        if (empty($expert)) {
            throw new HttpException(404, $localization->translate('Could not find requested expert'));
        }

        $form = $this->createForm(ExpertType::class);

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

                $expert->edit($data);
                $this->save($expert);
                $this->addFlash('success', $localization->translate('Expert was edited successfully'));
                return $localization->redirectToLocalizedRoute('admin_expert_edit', ['id' => $expert->getId(), 'locale' => $expert->getLocale()]);
            } else {
                $this->addFlash('error', $localization->translate('Failed to edit expert'));
            }
        }

        return $this->render(
            'admin/expert/expert-edit.twig',
            [
                'form' => $form->createView(),
                'expert' => $expert,
            ]
        );
    }

    public function deleteFile($id, $locale, Localization $localization)
    {
        $expert = $this->getDoctrine()->getRepository(Expert::class)->findOneBy(['id' => $id, 'locale' => $locale]);
        if (empty($expert)) {
            throw new HttpException(404, $localization->translate('Could not find requested expert'));
        }

        $expert->setFile(null);
        $this->save($expert);
        $this->addFlash('success', $localization->translate('File was removed successfully'));

        return $localization->redirectToLocalizedRoute('admin_expert_edit', ['id' => $expert->getId(), 'locale' => $expert->getLocale()]);
    }

}
