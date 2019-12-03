<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\ForgotPasswordType;
use App\Service\Localization;
use App\Form\ResetPasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends BaseController
{
    public function login(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('website/security/login.twig', [
                'last_username' => $lastUsername,
                'error' => $error,
            ]
        );
    }

    public function forgotPassword(Request $request, Localization $localization, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ForgotPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $data['username']]);
            if (empty($user)) {
                $this->addFlash('error', $localization->translate('We did not find a user with the given email address'));
            } else {
                try {
                    $user->setForgotPasswordToken();
                    $this->save($user);
                    $this->sendForgotPasswordEmail($mailer, $user, $localization);
                    $this->addFlash('success', $localization->translate('Follow the instructions in the email we have just sent in order to reset your password'));
                } catch (\Exception $e) {
                    $this->addFlash('error', $localization->translate('Not able to reset password'));
                }
            }
        }

        return $this->render('website/security/forgot-password.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    public function resetPassword(Request $request, Localization $localization, UserPasswordEncoderInterface $passwordEncoder)
    {
        if (empty($request->query->get('token'))) {
            throw new HttpException(404, $localization->translate('You have to click the link in the email we sent you to reset your password'));
        }
        $token = $request->query->get('token');

        $form = $this->createForm(ResetPasswordType::class, null, ['data' => ['action' => 'reset']]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if (!empty($data['plainPassword'])) {
                $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['forgot_password_token' => $token]);
                if (empty($user)) {
                    $this->addFlash('error', $localization->translate('Failed to reset password'));
                } else {
                    try {
                        $password = $passwordEncoder->encodePassword($user, $data['plainPassword']);
                        $user->setPassword($password);
                        $user->resetForgotPasswordToken();
                        $this->save($user);
                        $this->addFlash('success', $localization->translate('Successfully reset password'));
                        return $localization->redirectToLocalizedRoute('login');
                    } catch (\Exception $e) {
                        $this->addFlash('error', $localization->translate('Failed to reset password'));
                    }
                }
            } else {
                $this->addFlash('error', $localization->translate('The repeated password must be identical'));
            }
        }

        return $this->render('website/security/reset-password.twig',
            [
                'form' => $form->createView(),
                'token' => $token,
            ]
        );
    }

    protected function sendForgotPasswordEmail($mailer, $user, $localization)
    {
        $message = (new \Swift_Message($localization->translate('Reset your password')))
            ->setFrom('info@neobodies.nl')
            ->setTo($user->getEmail())
            ->setBody(
                $this->renderView(
                    'email/forgot-password.twig',
                    [
                        'token' => $user->getForgotPasswordToken(),
                    ]
                ),
                'text/html'
            );

        $mailer->send($message);
    }
}
