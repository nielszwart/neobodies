<?php


namespace App\Controller\Partner;


use App\Controller\BaseController;
use App\Entity\Partner;
use App\Service\FileUploader;
use App\Service\Localization;
use App\Form\PartnerType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PartnerEditController extends BaseController
{
    public function edit($id, $locale, Request $request, Localization $localization, FileUploader $fileUploader)
    {
        $partner = $this->getDoctrine()->getRepository(Partner::class)->findOneBy(['id' => $id, 'locale' => $locale]);
        if (empty($partner)) {
            throw new HttpException(404, $localization->translate('Could not find requested partner'));
        }

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

                if (!empty($data['link']) && strpos($data['link'], 'www') === 0) {
                    $data['link'] = 'http://' . $data['link'];
                }

                $partner->edit($data);
                $this->save($partner);
                $this->addFlash('success', $localization->translate('Partner was edited successfully'));
                return $localization->redirectToLocalizedRoute('admin_partner_edit', ['id' => $partner->getId(), 'locale' => $partner->getLocale()]);
            } else {
                $this->addFlash('error', $localization->translate('Failed to edit partner'));
            }
        }

        return $this->render(
            'admin/partner/partner-edit.twig',
            [
                'form' => $form->createView(),
                'partner' => $partner,
            ]
        );
    }

    public function deleteFile($id, $locale, Localization $localization)
    {
        $partner = $this->getDoctrine()->getRepository(Partner::class)->findOneBy(['id' => $id, 'locale' => $locale]);
        if (empty($partner)) {
            throw new HttpException(404, $localization->translate('Could not find requested partner'));
        }

        $partner->setFile(null);
        $this->save($partner);
        $this->addFlash('success', $localization->translate('File was removed successfully'));

        return $localization->redirectToLocalizedRoute('admin_partner_edit', ['id' => $partner->getId(), 'locale' => $partner->getLocale()]);
    }

}
