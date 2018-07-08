<?php


namespace App\Controller;


use App\Service\Localization;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends BaseController
{
    public function contact(Request $request, Localization $localization, \Swift_Mailer $mailer)
    {
        // Honeypot
        if (!empty($request->request->get('emailtest'))) {
            return $localization->redirectToLocalizedRoute('homepage');
        }

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            try {
                $message = (new \Swift_Message($localization->translate('Message through contact form')))
                    ->setFrom($data['email'])
                    ->setTo('michael@neocaveman.nl')
                    ->setBody(
                        $this->renderView(
                            'email/contact.twig',
                            [
                                'name' => $data['name'],
                                'phone' => !empty($data['phone']) ? $data['phone'] : '',
                                'message' => $data['message'],
                                'email' => $data['email'],
                            ]
                        ),
                        'text/html'
                    );

                $mailer->send($message);

                $this->addFlash('success', $localization->translate('Your message has been received'));
                return $localization->redirectToLocalizedRoute('contact');
            } catch (\Exception $e) {
                $this->addFlash('error', $localization->translate('Failed to send the message'));
            }
        }

        return $this->render('website/contact.twig', [
            'form' => $form->createView(),
        ]);
    }
}