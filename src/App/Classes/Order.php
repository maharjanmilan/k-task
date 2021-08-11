<?php

namespace App\Classes;

class Order
{
    protected $orderItems = [];
    protected $user;
    protected $status = 'new';
    protected $total = 0;
    protected $currency = 'USD';

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function addOrderItem(OrderItem $orderItem)
    {
        $this->orderItems[] = $orderItem;
        $this->total += $orderItem->getSubTotal();
        echo $orderItem->getProduct()->getName() . " added in order with price : " .
            $this->getCurrency() . " " . $orderItem->getProduct()->getPrice() . " and quantity: " .
            $orderItem->getQuantity() . "\n";
    }

    public function pay(string $paymentMethod)
    {
        echo "Order paid with payment method: " . $paymentMethod . "\n";
        if ($paymentMethod == 'points') {
            $this->payWithReward($this->user->getReward());
        }
        else{
            //payment process
        }
        //store order details to database
    }

    public function changeStatusToCompleted()
    {
        $this->status = 'completed';
        $this->user->reward($this);
    }

    public function totalAmount(): float
    {
        return $this->total;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getTotalInUSD()
    {
        return CurrencyConverter::convert($this->currency, 'USD', $this->totalAmount());
    }

    public function payWithReward(Reward $reward)
    {
        $reward->redeem($this->totalAmount());
    }
}