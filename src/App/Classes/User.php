<?php

namespace App\Classes;

class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $reward;

    private function __construct(int $userId, string $name, string $email)
    {
        $this->id = $userId;
        $this->name = $name;
        $this->email = $email;
        $this->reward = Reward::find($userId);
    }

    public static function find( int $userId ): User
    {
        //Get user info from database
        return new self($userId, "Milan Maharjan", "milan.com@gmail.com");
    }

    public function reward(Order $order)
    {
        $rewardPoint = (int) $order->getTotalInUSD();
        $rewardExpiryDate = (new \DateTime())->add(new \DateInterval('P1Y'));

        $this->reward->addReward($rewardPoint, $rewardExpiryDate);
        //store reward points in database
        echo "User rewarded with " . $rewardPoint . " points expiring on " . $rewardExpiryDate->format('Y-m-d') . "\n";
    }

    public function getReward(): Reward
    {
        return $this->reward;
    }
}