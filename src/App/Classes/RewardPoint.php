<?php

namespace App\Classes;

class RewardPoint
{
    protected $point;
    protected $expiryDate;

    public function __construct(string $point, \DateTime $expiryDate)
    {
        $this->point = $point;
        $this->expiryDate = $expiryDate;
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function consume(int $points = null)
    {
        if(is_null($points)){
            $this->point = 0;
        }
        else{
            $this->point -= $points;
        }
    }

}