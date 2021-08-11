<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Classes\{
    User,
    Product,
    Order,
    OrderItem
};

try {
    $user = User::find(1);
    echo "Current user points: " . $user->getReward()->getTotalPoints() . "\n";

    $product = Product::find(1);
    $orderItem = new OrderItem(
        $product,
        2
    );

    $order = new Order($user);
    $order->addOrderItem($orderItem);

    echo "Ordered placed with total amount " . $order->getCurrency() . " " . $order->totalAmount() . "\n";

    $order->pay('points');

    $order->changeStatusToCompleted();
    echo "Current user points: " . $user->getReward()->getTotalPoints() . "\n";


} catch (InsufficientPointsException $e) {
    echo $e->getMessage();
}