<?php


namespace App\Controller\Account;


use App\Controller\BaseController;
use App\Entity\Account;

class AccountOverviewController extends BaseController
{
    public function overview()
    {
        $accounts = $this->getDoctrine()->getRepository(Account::class)->findAll();

        $now = new \DateTime();
        foreach ($accounts as &$account) {
            $dob = new \DateTime($account->getDateOfBirth());
            $diff = $now->diff($dob);
            $account->age = $diff->y;
        }
        unset($account);

        return $this->render(
            'admin/account/account-overview.twig',
            [
                'accounts' => $accounts,
            ]
        );
    }
}