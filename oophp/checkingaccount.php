<?php
class CheckingAccount extends bankaccount{
    private $minbalance;

    public function __construct($amount, $minbalance)
    {
        if ($amount > 0 && $amount >= $minbalance) {
            parent::__construct($amount);
            $this->minbalance = $minbalance;
        }else {
            throw new InvalidArgumentException('amount must be more than zero and higher than the minimum balance');
        }
    }
    public function withdraw($amount)
    {
        $canwithdraw = $amount > 0 &&
            $this->getBalance() - $amount >= $this->minbalance;

        if ($canwithdraw) {
            parent::withdraw($amount);
            return true;
        }
        return false;
    }
}
