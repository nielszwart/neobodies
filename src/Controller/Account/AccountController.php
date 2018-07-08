<?php


namespace App\Controller\Account;


use App\Controller\BaseController;
use App\Entity\Account;
use App\Service\GenBluePrintService;
use App\Service\Localization;

class AccountController extends BaseController
{
    public function account(Localization $localization)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $localization->redirectToLocalizedRoute('admin_dashboard');
        }

        $account = $this->getDoctrine()->getRepository(Account::class)->findOneBy(['user' => $this->getUser()->getId()]);

        return $this->render('website/account/account.twig', [
            'account' => $account,
            'hasGenBluePrintAccess' => GenBluePrintService::hasGenBluePrintAccess($account),
        ]);
    }
}
