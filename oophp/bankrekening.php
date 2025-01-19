<?php
require 'SavingAccount.php';

$account = new SavingAccount("Piet",100,0.05);
$account->setInterestRate(0.05);
echo $account->getBalance();

$accounts=[];
$accounts[]=new SavingAccount("Kwik",100, 0.05);
$accounts[]=new SavingAccount("Kwek",100, 0.06);
$accounts[]=new SavingAccount("Kwak",100, 0.03);
$accounts[]=new SavingAccount("Donald",100, 0.05);
$accounts[]=new SavingAccount("Katrien",100, 0.06);

foreach ($accounts as $account) {
    $account->addInterest();
    echo "<br>";
}

foreach ($accounts as $account) {
    echo $account->getName();
    echo " ";
    echo $account->getBalance();
    echo "<br>";
}
echo $accounts('kwik')->withdraw(20);

?>