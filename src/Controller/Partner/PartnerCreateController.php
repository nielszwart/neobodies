<?php


namespace App\Controller\Partner;


use App\Controller\BaseController;
use App\Entity\Partner;
use App\Form\PartnerType;
use App\Service\FileUploader;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class PartnerCreateController extends BaseController
{
    public function create($locale, Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $partner = new Partner($locale);
        $form = $this->createForm(PartnerType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $data = $form->getData();

                if (!empty($data['image']) && $data['image'] instanceof UploadedFile) {
                    $data['image'] = $fileUploader->upload($data['image']);
                } else {
                    unset($data['image']);
                }

                if (strpos($data['link'], 'www') === 0) {
                    $data['link'] = 'http://' . $data['link'];
                }

                $partner->edit($data);

                $em = $this->getDoctrine()->getManager();
                $highestId = $em->createQueryBuilder()
                    ->select('MAX(p.id)')
                    ->from(Partner::class, 'p')
                    ->getQuery()
                    ->getSingleScalarResult();

                $partner->setId((int) $highestId + 1);
                $this->save($partner);
                $this->addFlash('success', $localization->translate('Partner was created successfully'));
                return $localization->redirectToLocalizedRoute('admin_partner_overview');
            } else {
                $this->addFlash('error', $localization->translate('Failed to create partner'));
            }
        }

        return $this->render(
            'admin/partner/partner-create.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
