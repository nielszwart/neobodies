<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="orders")
 */
class Order
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="orders")
     */
    private $account;

    /**
     * @ORM\OneToMany(targetEntity="OrderLine", mappedBy="order")
     */
    private $orderLines;

    /**
     * @ORM\Column(type="string")
     */
    private $status = 'open';

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $total_price;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $payment_method;

    /**
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    private $payment_provider_id = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_created;

    public function __construct()
    {
        $this->date_created = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount($account)
    {
        $this->account = $account;
    }

    public function getOrderLines()
    {
        return $this->orderLines;
    }

    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function setTotalPrice($price)
    {
        $this->total_price = $price;
    }

    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
    }

    public function getPaymentProviderId()
    {
        return $this->payment_provider_id;
    }

    public function setPaymentProviderId($payment_provider_id)
    {
        $this->payment_provider_id = $payment_provider_id;
    }

    public function getDateCreated()
    {
        if (!is_null($this->date_created)) {
            return $this->date_created->format('Y-m-d H:i:s');
        }
        return $this->date_created;
    }

    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }
}