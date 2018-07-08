<?php


namespace App\Controller\Tool;


use App\Controller\BaseController;
use App\Entity\Tool;
use App\Service\FileUploader;
use App\Service\Localization;
use App\Form\ToolType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ToolEditController extends BaseController
{
    public function edit($id, $locale, Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $tool = $this->getDoctrine()->getRepository(Tool::class)->findOneBy(['id' => $id, 'locale' => $locale]);
        if (empty($tool)) {
            throw new HttpException(404, $localization->translate('Could not find requested tool'));
        }

        $form = $this->createForm(ToolType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $data = $form->getData();

                if (!empty($data['image']) && $data['image'] instanceof UploadedFile) {
                    $data['image'] = $fileUploader->upload($data['image']);
                } else {
                    unset($data['image']);
                }

                if (!empty($data['file']) && $data['file'] instanceof UploadedFile) {
                    $data['file'] = $fileUploader->upload($data['file']);
                } else {
                    unset($data['file']);
                }

                if (strpos($data['link'], 'www') === 0) {
                    $data['link'] = 'http://' . $data['link'];
                }

                $tool->edit($data);
                $this->save($tool);
                $this->addFlash('success', $localization->translate('Tool was edited successfully'));
                return $localization->redirectToLocalizedRoute('admin_tool_edit', ['id' => $tool->getId(), 'locale' => $tool->getLocale()]);
            } else {
                $this->addFlash('error', $localization->translate('Failed to edit tool'));
            }
        }

        return $this->render(
            'admin/tool/tool-edit.twig',
            [
                'form' => $form->createView(),
                'tool' => $tool,
            ]
        );
    }

    public function deleteFile($id, $locale, Localization $localization)
    {
        $tool = $this->getDoctrine()->getRepository(Tool::class)->findOneBy(['id' => $id, 'locale' => $locale]);
        if (empty($tool)) {
            throw new HttpException(404, $localization->translate('Could not find requested tool'));
        }

        $tool->setFile(null);
        $this->save($tool);
        $this->addFlash('success', $localization->translate('File was removed successfully'));

        return $localization->redirectToLocalizedRoute('admin_tool_edit', ['id' => $tool->getId(), 'locale' => $tool->getLocale()]);
    }

}
