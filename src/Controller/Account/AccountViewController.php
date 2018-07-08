<?php


namespace App\Controller\Account;


use App\Controller\BaseController;
use App\Entity\Account;
use App\Entity\Genblueprint;
use App\Service\Localization;

class AccountViewController extends BaseController
{
    public function view($id)
    {
        $account = $this->getDoctrine()->getRepository(Account::class)->find($id);

        $now = new \DateTime();
        $dob = new \DateTime($account->getDateOfBirth());
        $diff = $now->diff($dob);
        $account->age = $diff->y;

        $genblueprint = [];
        if (!empty($account->getGenblueprint())) {
            $genblueprint = $this->calculateGenblueprint($account->getGenblueprint());
        }

        return $this->render(
            'admin/account/account-view.twig',
            [
                'a' => $account,
                'genblueprint' => $genblueprint,
            ]
        );
    }

    private function calculateGenblueprint(Genblueprint $genblueprint)
    {
        if (empty($genblueprint)) {
            return [];
        }

        $totals = [
            'green' => 0,
            'blue' => 0,
            'red' => 0,
            'total' => 0,
        ];
        foreach ($genblueprint->getAnswers() as $answer) {

            if (in_array($answer->getQuestion(), ['question01', 'question02', 'question03', 'question04', 'question05', 'question06'])) {
                continue;
            }

            if ($answer->getGreen()) {
                $totals['green']++;
                $totals['total']++;
            }
            if ($answer->getBlue()) {
                $totals['blue']++;
                $totals['total']++;
            }
            if ($answer->getRed()) {
                $totals['red']++;
                $totals['total']++;
            }
        }

        return [
            'green' => round(($totals['green'] / $totals['total']) * 100, 0),
            'blue' => round(($totals['blue'] / $totals['total']) * 100, 0),
            'red' => round(($totals['red'] / $totals['total']) * 100, 0),
        ];
    }

    public function toggleAccountFree($id, Localization $localization)
    {
        $account = $this->getDoctrine()->getRepository(Account::class)->find($id);
        $account->toggleFree();

        $free = $account->getFree() ? $localization->translate('Yes') : $localization->translate('No');

        $this->save($account);
        $this->addFlash('success', $localization->translate('Toggled free account to: ' . $free ));

        return $localization->redirectToLocalizedRoute('admin_account_view', ['id' => $id]);
    }

    public function toggleAccountActive($id, Localization $localization)
    {
        $account = $this->getDoctrine()->getRepository(Account::class)->find($id);
        $user = $account->getUser();
        $user->toggleActive();

        $active = $user->getIsActive() ? $localization->translate('Active') : $localization->translate('Inactive');

        $this->save($user);
        $this->addFlash('success', $localization->translate('Toggled account to: ' . $active ));

        return $localization->redirectToLocalizedRoute('admin_account_view', ['id' => $id]);
    }
}
