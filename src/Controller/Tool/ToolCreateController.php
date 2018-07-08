<?php


namespace App\Controller\Tool;


use App\Controller\BaseController;
use App\Entity\Tool;
use App\Service\FileUploader;
use App\Service\Localization;
use App\Form\ToolType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ToolCreateController extends BaseController
{
    public function create($locale, Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $tool = new Tool($locale);
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

                $em = $this->getDoctrine()->getManager();
                $highestId = $em->createQueryBuilder()
                    ->select('MAX(t.id)')
                    ->from(Tool::class, 't')
                    ->getQuery()
                    ->getSingleScalarResult();

                $tool->setId((int) $highestId + 1);
                $this->save($tool);
                $this->addFlash('success', $localization->translate('Tool was created successfully'));
                return $localization->redirectToLocalizedRoute('admin_tool_overview');
            } else {
                $this->addFlash('error', $localization->translate('Failed to create tool'));
            }
        }

        return $this->render(
            'admin/tool/tool-create.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
