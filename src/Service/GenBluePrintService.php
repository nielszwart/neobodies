<?php


namespace App\Service;


use App\Entity\Account;

class GenBluePrintService
{
    public static function hasGenBluePrintAccess(Account $account)
    {
        if ($account->getFree()) {
            return true;
        }

        $orders = $account->getOrders();
        if (empty($orders)) {
            return false;
        }

        foreach ($orders as $order) {
            if ($order->getStatus() !== 'paid') {
                continue;
            }

            foreach ($order->getOrderLines() as $orderLine) {
                echo $orderLine->getProduct()->getTitle();
                if ($orderLine->getProduct()->getHasGenblueprint()) {
                    return true;
                }
            }
        }

        return false;
    }
}
