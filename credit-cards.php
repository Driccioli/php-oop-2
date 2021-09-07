<?php

    class Card{
        private $owner;
        private $number;
        private $expirationDate;
        private $secretCode;
        private $money;
        
        function __construct(string $owner, int $number, string $expirationDate, int $secretCode, float $money){
            

            $currentDate = getdate();
            if($expirationDate > $currentDate){
                throw new Exception("This credit card has expired.");
                return;
            }
            $this->owner = $owner;
            $this->number = $number;
            $this->secretCode = $secretCode;
            $this->money = $money;
        }
    }

?>