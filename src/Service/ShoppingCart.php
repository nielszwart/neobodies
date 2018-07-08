<?php


namespace App\Service;


use App\Entity\Product;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ShoppingCart
{
    private $session;
    private $cart;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->cart = $session->get('cart', $this->getEmptyCart());
    }

    public function getEmptyCart()
    {
        return [
            'items' => [],
            'payment_method' => null,
            'total_price' => 0,
        ];
    }

    public function writeCart()
    {
        $this->session->set('cart', $this->cart);
        return $this->cart;
    }

    public function addToCart(Product $product, $amount = 1, $size = '', $color = '')
    {
        foreach ($this->cart['items'] as $key => $cartItem) {
            if (
                $cartItem['product_id'] === $product->getId()
                && $cartItem['color'] === $color
                && $cartItem['size'] === $size
            ) {
                $this->cart['items'][$key]['amount'] += $amount;
                $this->cart['items'][$key]['price'] = round($this->cart['items'][$key]['amount'] * $product->getPrice(), 2);
                $this->calculateTotalPrice();

                return $this->writeCart();
            }
        }

        $this->cart['items'][] = [
            'product_id' => $product->getId(),
            'product' => $product,
            'amount' => $amount,
            'color' => $color,
            'size' => $size,
            'price' => round($amount * $product->getPrice(), 2),
        ];
        $this->calculateTotalPrice();

        return $this->writeCart();
    }

    public function removeFromCart(Product $product, $color = '', $size = '')
    {
        foreach ($this->cart['items'] as $key => $cartItem) {
            if (
                $cartItem['product_id'] === $product->getId()
                && $cartItem['color'] === $color
                && $cartItem['size'] === $size
            ) {
                unset($this->cart['items'][$key]);
            }
        }
        $this->calculateTotalPrice();

        return $this->writeCart();
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function getCartItems()
    {
        return $this->cart['items'];
    }

    public function clearCart()
    {
        $this->cart = $this->getEmptyCart();
        $this->writeCart();
    }

    public function setPaymentMethod($method)
    {
        $this->cart['payment_method'] = $method;
        $this->writeCart();
    }

    public function getPaymentMethod()
    {
        return $this->cart['payment_method'];
    }

    public function getTotalPrice()
    {
        return $this->cart['total_price'];
    }

    public function setTotalPrice($price)
    {
        $this->cart['total_price'] = round($price, 2);
        $this->writeCart();
    }

    public function calculateTotalPrice()
    {
        $price = 0;
        foreach ($this->cart['items'] as $item) {
            $price += $item['price'];
        }

        $this->setTotalPrice(round($price, 2));
    }
}