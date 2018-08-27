<?php


namespace App\Controller\Expert;


use App\Controller\BaseController;
use App\Entity\Expert;
use App\Form\ExpertType;
use App\Service\FileUploader;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ExpertCreateController extends BaseController
{
    public function create($locale, Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $expert = new Expert($locale);
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

                $em = $this->getDoctrine()->getManager();
                $highestId = $em->createQueryBuilder()
                    ->select('MAX(p.id)')
                    ->from(Expert::class, 'p')
                    ->getQuery()
                    ->getSingleScalarResult();

                $expert->setId((int) $highestId + 1);
                $this->save($expert);
                $this->addFlash('success', $localization->translate('Expert was created successfully'));
                return $localization->redirectToLocalizedRoute('admin_expert_overview');
            } else {
                $this->addFlash('error', $localization->translate('Failed to create expert'));
            }
        }

        return $this->render(
            'admin/expert/expert-create.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
