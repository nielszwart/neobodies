<?php


namespace App\Controller\Shop;


use App\Controller\BaseController;
use App\Entity\Account;
use App\Entity\Order;
use App\Entity\OrderLine;
use App\Entity\Product;
use App\Service\Hostnames;
use App\Service\Localization;
use App\Service\ShoppingCart;
use Symfony\Component\HttpFoundation\Request;

class CartController extends BaseController
{
    public function cart(Request $request, Localization $localization, ShoppingCart $cart, Hostnames $host)
    {
        if ($request->isMethod('post')) {
            if ($cart->getTotalPrice() < 0.01) {
                $this->addFlash('error', $localization->translate('Minimum order price is 1 cent'));
                return $localization->redirectToLocalizedRoute('account_shop_cart');
            }

            $order = $this->createNewOrder($cart);

            $mollie = new \Mollie_API_Client();
            $mollie->setApiKey($this->getParameter('mollie_api_key'));
            $payment = $mollie->payments->create([
                "amount"      => $cart->getTotalPrice(),
                "description" => $localization->translate('NEOBODIES order'),
                "redirectUrl" => $host->getWebsiteUrl() . $localization->getLocalizedRoute('account_shop_order_placed'),
                "webhookUrl"  => $host->getWebsiteUrl() . $localization->getLocalizedRoute('mollie_webhook'),
            ]);

            $order->setPaymentProviderId($payment->id);
            $order->setStatus('processing-payment');
            $this->save($order);
            $cart->clearCart();

            header("Location: " . $payment->getPaymentUrl());
            exit;
        }

        return $this->render(
            'website/shop/cart.twig',
            [
                'cart' => $cart->getCart(),
            ]
        );
    }

    public function clear(Localization $localization, ShoppingCart $cart)
    {
        try {
            $cart->clearCart();
            $this->addFlash('success', $localization->translate('Cleared your shopping cart'));
                return $localization->redirectToLocalizedRoute('account_shop');
        } catch (\Exception $e) {
            $this->addFlash('error', $localization->translate('Could not clear your shopping cart'));
            return $localization->redirectToLocalizedRoute('account_shop_cart');
        }
    }

    private function createNewOrder($cart)
    {
        $account = $this->getDoctrine()->getRepository(Account::class)->findOneBy(['user' => $this->getUser()->getId()]);

        $order = new Order();
        $order->setAccount($account);
        $order->setTotalPrice($cart->getTotalPrice());
        $this->save($order);

        foreach ($cart->getCartItems() as $item) {
            $product = $this->getDoctrine()->getRepository(Product::class)->find($item['product']->getId());
            $orderLine = new OrderLine($order, $product, $item['price'], $item['amount'], $item['size'], $item['color']);
            $this->save($orderLine);
        }

        return $order;
    }
}
