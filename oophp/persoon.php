<?php
{
    class Persoon
    {


        public $naam;
        private $leeftijd;
        protected $geslacht;
        public $isStudent;
        public $gemiddeldCijfer;
        //constructor methode
        function __construct(string $naam, int $leeftijd, string $geslacht)
        {
            $this->naam = $naam;
            $this->leeftijd = $leeftijd;
            $this->geslacht = $geslacht;
            echo "\n Nieuw Persoon-object aangemaakt";
            echo "\n De property naam is " . $this->naam;
        }
        function __destruct()
        {
            //voer hier de benodigde acties uit;
            echo "\n Persoon object $this->naam wordt verwijderd";
        }

        function setGeslacht(string $geslacht)
        {
            $this->geslacht = $geslacht;
        }
        function getGeslacht()
        {
            return $this->geslacht;
        }
        function setLeeftijd(string $leeftijd)
        {
            $this->leeftijd = $leeftijd;
        }
        function getLeeftijd()
        {
            return $this->leeftijd;
            }
            function getGegevens(){
            $gegevens =
                "\nDe gegevens van " . $this->naam . " zijn: " .
                "\nleeftijd: " . $this->leeftijd .
                "\ngeslacht: " . $this->geslacht;
                return $gegevens;
            }
        function toString()
        {
            return("\n De gegevens van " . $this->naam . "zijn " .
                "\nLeeftijd: " . $this->leeftijd .
                "\n Geslacht: " . $this->geslacht);
            }
    }
}
?>