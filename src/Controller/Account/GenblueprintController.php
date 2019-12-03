<?php

namespace App\Controller\Account;


use App\Controller\BaseController;
use App\Entity\Account;
use App\Entity\Answer;
use App\Entity\Genblueprint;
use App\Entity\PhysicalTest;
use App\Form\GenblueprintType;
use App\Form\PhysicalTestType;
use App\Service\GenBluePrintService;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\Request;

class GenblueprintController extends BaseController
{
    public function genblueprint(Request $request, Localization $localization, \Swift_Mailer $mailer)
    {
        $account = $this->getDoctrine()->getRepository(Account::class)->findOneBy(['user' => $this->getUser()->getId()]);

        if (!GenBluePrintService::hasGenBluePrintAccess($account)) {
            return $localization->redirectToLocalizedRoute('account');
        }

        $first = empty($account->getGenblueprint());
        $genblueprint = $first ? new Genblueprint() : $account->getGenblueprint();
        $physicalTest = !empty($genblueprint->getPhysicalTest()) ? $genblueprint->getPhysicalTest() : new PhysicalTest($genblueprint);

        $answers = [];
        if (!$first) {
            foreach ($genblueprint->getAnswers() as $answer) {
                $question = $answer->getQuestion();
                if ($answer->getGreen()) {
                    $answers[$question][] = 'green';
                }
                if ($answer->getRed()) {
                    $answers[$question][] = 'red';
                }
                if ($answer->getBlue()) {
                    $answers[$question][] = 'blue';
                }
            }
        }

        $form = $this->createForm(GenblueprintType::class, ['answers' => $answers]);
        $physicalForm = $this->createForm(PhysicalTestType::class, $physicalTest);
        $form->handleRequest($request);
        $physicalForm->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $data = $form->getData();
                $physicalTest = $physicalForm->getData();

                if ($first) {
                    $this->save($genblueprint);
                    $account->setGenblueprint($genblueprint);
                    $this->save($account);

                    foreach ($data as $question => $answers) {
                        $answer = new Answer($genblueprint, $question, $answers);
                        $this->save($answer);
                    }

                    if ($physicalTest) {
                        $genblueprint->setPhysicalTest($physicalTest);
                        $this->save($physicalTest);
                        $this->save($genblueprint);
                    }

                    $this->addFlash('success', $localization->translate('Successfully created your GenBluePrint'));
                    $this->sendGenBluePrintEmail($mailer, $localization, $account, true);
                    $this->sendEmailToClient($mailer, $localization, ['email' => $this->getUser()->getEmail()]);
                } else {
                    foreach ($data as $question => $answers) {
                        $answer = $this->getDoctrine()->getRepository(Answer::class)->findOneBy([
                            'genblueprint' => $genblueprint,
                            'question' => $question,
                        ]);
                        if (empty($answer)) {
                            $answer = new Answer($genblueprint, $question, $answers);
                            $this->save($answer);
                            continue;
                        }
                        $answer->edit($answers);
                        $this->save($answer);
                    }

                    if ($physicalTest) {
                        $this->save($physicalTest);
                    }

                    $this->save($genblueprint);

                    $this->addFlash('success', $localization->translate('Successfully updated your GenBluePrint'));
                    $this->sendGenBluePrintEmail($mailer, $localization, $account);
                }

                return $localization->redirectToLocalizedRoute('account');
            } catch (\Exception $e) {
                $this->addFlash('error', $localization->translate('Failed to save your GenBluePrint'));
            }
        }

        return $this->render('website/account/genblueprint.twig', [
                'form' => $form->createView(),
                'physicalForm' => $physicalForm->createView(),
                'account' => $account,
                'genblueprint' => $genblueprint,
                'blocks' => $this->getBlocks([17,18,19], $request->getLocale())
            ]
        );
    }

    private function sendGenBluePrintEmail(\Swift_Mailer $mailer, Localization $localization, Account $account, $new = false)
    {
        $subject = $new ? "A new GenBluePrint has submitted" : "A GenBluePrint was edited";
        $message = (new \Swift_Message($localization->translate($subject)))
            ->setFrom($account->getUser()->getEmail())
            ->setTo('michael@neocaveman.nl')
            ->setBody(
                $this->renderView(
                    'email/genblueprint.twig',
                    [
                        'name' => $account->getFullName(),
                        'new' => $new,
                        'accountId' => $account->getId(),
                    ]
                ),
                'text/html'
            );

        $mailer->send($message);
    }

    protected function sendEmailToClient($mailer, $localization, $data)
    {
        $message = (new \Swift_Message($localization->translate('GenBluePrint test')))
            ->setFrom('info@neobodies.nl')
            ->setTo($data['email'])
            ->setBody($this->renderView('email/test-response.twig'), 'text/html');

        $mailer->send($message);
    }
}
