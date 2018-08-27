<?php

namespace App\Controller\Account;

use App\Controller\BaseController;
use App\Entity\User;
use App\Form\AccountType;
use App\Form\UserType;
use App\Service\Localization;
use App\Entity\Account;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends BaseController
{
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, Localization $localization)
    {
        $user = new User();
        $userForm = $this->createForm(UserType::class, $user);
        $userForm->handleRequest($request);

        $account = new Account();
        $accountForm = $this->createForm(AccountType::class, $account);
        $accountForm->handleRequest($request);
        if ($request->isMethod('post')) {
            if ($userForm->isValid() && $accountForm->isValid()) {
                try {
                    $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                    $user->setPassword($password);
                    $user->setUsername($user->getEmail());
                    $this->save($user);

                    $account->setUser($user);
                    $this->save($account);
                } catch (\Exception $e) {
                    $this->addFlash('error', $localization->translate('Failed to create an account'));
                }

                try {
                    $this->login($user, $localization);
                } catch (\Exception $exception) {
                    return $localization->redirectToLocalizedRoute('registered');
                }
            } else {
                $this->addFlash('error', $localization->translate('Failed to create an account'));
            }

        }

        return $this->render('website/account/register.twig', [
                'userForm' => $userForm->createView(),
                'accountForm' => $accountForm->createView(),
            ]
        );
    }

    protected function login($user, $localization)
    {
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $this->container->get('security.token_storage')->setToken($token);
        $this->container->get('session')->set('_security_main', serialize($token));

        return $localization->redirectToLocalizedRoute('account');
    }

    public function registered()
    {
        return $this->render(
            'website/account/registered.twig'
        );
    }
}
