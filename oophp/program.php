<?php
include 'Persoon.php';
$umut = new Persoon("Umut", 18, "M");
$demirel = new Persoon("Demirel", 23, "M");
$demirel->setLeeftijd(24);
echo "\n De leeftijd van Demirel is: " . $demirel->getLeeftijd();
echo $demirel->getGegevens();
echo $demirel->toString();
?>
