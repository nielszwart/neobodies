<?php


namespace App\Controller\Account;


use App\Controller\BaseController;
use App\Entity\Account;
use App\Entity\OrderLine;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PurchaseController extends BaseController
{
    public function overview()
    {
        $account = $this->getDoctrine()->getRepository(Account::class)->findOneBy(['user' => $this->getUser()->getId()]);

        $orders = $account->getOrders();

        return $this->render(
            'website/account/purchase-overview.twig',
            [
                'orders' => $orders,
            ]
        );
    }

    public function download($id, FileUploader $fileUploader)
    {
        $orderLine = $this->getDoctrine()->getRepository(OrderLine::class)->find($id);
        if (empty($orderLine)) {
            throw new HttpException(404, "Could not find your purchase.");
        }

        $admin = false;
        if (in_array('ROLE_ADMIN', $this->getUser()->getRoles())) {
            $admin = true;
        } else {
            $account = $this->getDoctrine()->getRepository(Account::class)->findOneBy(['user' => $this->getUser()->getId()]);
            if (empty($account)) {
                throw new HttpException(404, "Could not find your account.");
            }
        }

        $order = $orderLine->getOrder();
        if (!$admin && $order->getAccount()->getId() !== $account->getId()) {
            throw new HttpException(404, "Access denied.");
        }

        $product = $orderLine->getProduct();
        if (empty($product)) {
            throw new HttpException(404, "Could not find your purchase.");
        }

        $file = null;
        if ($product->getEbook()) {
            $file = $product->getEbook();
        }

        if (!$file) {
            throw new HttpException(404, "Your purchased file was corrupted, please contact us.");
        }

        $response = new BinaryFileResponse($fileUploader->getTargetDir() . $file);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT);

        return $response;
    }
}
