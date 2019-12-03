<?php


namespace App\Controller\Shop;


use App\Controller\BaseController;
use App\Entity\Order;
use App\Service\Localization;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MollieController extends BaseController
{
    public function webhook(Request $request, \Swift_Mailer $mailer, Localization $localization)
    {
        $mollie = new \Mollie_API_Client();
        $mollie->setApiKey($this->getParameter('mollie_api_key'));

        if (empty($request->request->get('id'))) {
            throw new HttpException(500, "That is not what we expect");
        }

        $payment = $mollie->payments->get($request->request->get('id'));
        if (!$payment) {
            throw new HttpException(404, "The ID Mollie gave is not known by Mollie (??)");
        }

        $order = $this->getDoctrine()->getRepository(Order::class)->findOneBy(['payment_provider_id' => $payment->id]);
        if (!$order) {
            throw new HttpException(404, "The Mollie ID is not known by us");
        }

        if ($payment->isPaid()) {
            $order->setStatus('paid');
            $order->setPaymentMethod($payment->method);
            try {
                $this->sendNewOrderEmail($mailer, $localization, $order);
            } catch (\Exception $e) {
                // Oh well
            }
        } elseif (! $payment->isOpen()) {
            $order->setStatus('aborted');
        }

        $this->save($order);

        return new Response();
    }

    protected function sendNewOrderEmail(\Swift_Mailer $mailer, Localization $localization, Order $order)
    {
        $account = $order->getAccount();
        $message = (new \Swift_Message($localization->translate('New order')))
        ->setFrom($account->getUser()->getEmail())
        ->setTo('info@neobodies.nl')
        ->setBody(
            $this->renderView(
                'email/new-order.twig',
                [
                    'order' => $order,
                ]
            ),
            'text/html'
        );

        $mailer->send($message);
    }
}
