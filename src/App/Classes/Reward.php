<?php

namespace App\Classes;

class Reward
{
    protected $rewardPoints = [];

    public function __construct(array $rewardPoints = null)
    {
        if($rewardPoints) {
            $this->rewardPoints = $rewardPoints;
        }
    }

    public static function find(int $userId): Reward
    {
        //get this from database
        $rewardPointArray = [
            ['point' => 100, 'expiryDate' => new \DateTime('2022-01-29')],
            ['point' => 200, 'expiryDate' => new \DateTime('2022-06-13')],
        ];

        $rewardPointObjects = [];

        foreach($rewardPointArray as $rewardPoint){
            if($rewardPoint['expiryDate'] > new \DateTime()) {
                $rewardPointObjects[] = new RewardPoint(
                    $rewardPoint['point'],
                    $rewardPoint['expiryDate']
                );
            }
        }
        return new self($rewardPointObjects);
    }

    public function addReward(string $point, \DateTime $expiryDate)
    {
        $this->rewardPoints[] = new RewardPoint($point, $expiryDate);
    }

    public function getTotalPoints(): int
    {
        $points = 0;
        foreach($this->rewardPoints as $rewardPoint){
            $points += $rewardPoint->getPoint();
        }
        return $points;
    }

    public function redeem(float $amount)
    {
        $requiredPoints = $this->amountToPoints($amount);
        echo "Total points redeemed: " . $requiredPoints . "\n";
        if($requiredPoints > $this->getTotalPoints()) {
            throw new InsufficientPointsException('Insufficient Points');
        }

        $this->consumeRewardPoints($requiredPoints);
    }

    public function consumeRewardPoints(int $requiredPoints)
    {
        $remainingPoints = $requiredPoints;

        foreach($this->rewardPoints as $rewardPoint){
            if($remainingPoints >= $rewardPoint->getPoint()){
                $remainingPoints -= $rewardPoint->getPoint();
                $rewardPoint->consume();
            }
            else{
                $rewardPoint->consume($remainingPoints);
                $remainingPoints = 0;
            }

        }
    }

    public function amountToPoints(float $amount)
    {
        return $amount * 100;
    }
}