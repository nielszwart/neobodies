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
        if ($this->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $localization->redirectToLocalizedRoute('account');
        }

        $user = new User();
        $userForm = $this->createForm(UserType::class, $user);
        $userForm->handleRequest($request);

        $account = new Account();
        $accountForm = $this->createForm(AccountType::class, $account);
        $accountForm->handleRequest($request);
        if ($request->isMethod('post')) {
            $emailAlreadyExists = $this->checkUserExists($user->getEmail());
            if (!$emailAlreadyExists && $userForm->isValid() && $accountForm->isValid()) {
                try {
                    $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                    $user->setPassword($password);
                    $user->setUsername($user->getEmail());
                    $this->save($user);

                    $account->setUser($user);
                    $this->save($account);
                } catch (\Exception $e) {
                    $error = true;
                    $this->addFlash('error', $localization->translate('Failed to create an account'));
                }

                if (!isset($error)) {
                    try {
                        $this->login($user);
                        return $localization->redirectToLocalizedRoute('account');
                    } catch (\Exception $exception) {
                        return $localization->redirectToLocalizedRoute('registered');
                    }
                }
            } else {
                $message = 'Failed to create an account';
                if ($emailAlreadyExists) {
                    $message = 'E-mail address already exists';
                }
                $this->addFlash('error', $localization->translate($message));
            }

        }

        return $this->render('website/account/register.twig', [
                'userForm' => $userForm->createView(),
                'accountForm' => $accountForm->createView(),
            ]
        );
    }

    protected function checkUserExists($email)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $email]);
        return $user instanceof User;
    }

    protected function login(User $user)
    {
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $this->container->get('security.token_storage')->setToken($token);
        $this->container->get('session')->set('_security_main', serialize($token));
    }

    public function registered()
    {
        return $this->render(
            'website/account/registered.twig'
        );
    }
}
