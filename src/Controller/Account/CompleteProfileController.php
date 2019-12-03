<?php


namespace App\Controller\Account;


use App\Controller\BaseController;
use App\Entity\Account;
use App\Entity\Profile;
use App\Form\ProfileType;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\Request;

class CompleteProfileController extends BaseController
{
    public function complete(Request $request, Localization $localization)
    {
        $account = $this->getDoctrine()->getRepository(Account::class)->findOneBy(['user' => $this->getUser()->getId()]);

        $first = empty($account->getProfile());
        $profile = $first ? new Profile() : $account->getProfile();

        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->save($profile);

                if ($first) {
                    $account->setProfile($profile);
                    $this->save($account);
                }

                $this->addFlash('success', $localization->translate('Successfully updated your profile'));

                return $localization->redirectToLocalizedRoute('account');
            } catch (\Exception $e) {
                $this->addFlash('error', $localization->translate('Failed to update your profile'));
            }
        }

        return $this->render('website/account/complete-profile.twig', [
                'form' => $form->createView(),
                'account' => $account,
                'profile' => $profile,
                'blocks' => $this->getBlocks([16], $request->getLocale())
            ]
        );
    }
}
