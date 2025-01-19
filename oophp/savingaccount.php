<?php
include "BankAccount.php";
class SavingAccount extends BankAccount
{
    private $interestRate;
private $name;
    public function __construct($name, $balance, $interestRate)
    {
        parent::__construct($balance);
        $this->name = $name;
        $this->interestRate = $interestRate;
    }

    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        $interest = $this->interestRate * $this->getBalance();
        $this->deposit($interest);
        }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
?>
