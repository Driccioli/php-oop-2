<?php
    require "credit-cards.php";
    class User{
        public $userName;
        private $country;
        private $addresses = [];

        public $cart = [];

        private $productsPrice;
        private $expeditionsPrice;
        private $totalPrice;

        private $creditCards = [];

        function __construct(string $userName, string $country, array $addresses){
            $this->userName = $userName;
            $this->country = $country;
            $this->addresses = $addresses;
        }

        public function addProduct(Product $product, int $quantity){
            for($i=1;$i<$quantity;$i++){
                $this->cart[]=$product;
            }
            $this->calculatePrice();
        }

        public function removeProduct(Product $product, $quantity){
            for($i=1;$i<$quantity;$i++){
                $productToDelete = array_search($product, $this->cart);
                if($productToDelete === false){
                    throw new Exception ('Product does not exist');
                    break;
                }
                unset($productToDelete);
                array_values($this->cart);
            }
            $this->calculatePrice();
        }

        function calculatePrice(){
            $this->productsPrice = 0;
            $this->expeditionsPrice = 0;
            $this->totalPrice = 0;

            foreach($this->cart as $product){
                $this->productsPrice += $product->price;
                $this->expeditionsPrice += $product->expeditionPrice;
            }
            $this->totalPrice = $this->productsPrice + $this->expeditionsPrice;
        }

        public function addCreditCard(Card $creditCard){
            $this->creditCards[] = $creditCard;
        }

        public function removeCreditCard(Card $creditCard){
            $cardToDelete = array_search($card, $this->creditCards);
            if($cardToDelete === false){
                throw new Exception ('Card does not exist');
                return;
            }
            unset($cardToDelete);
            array_values($this->creditCards);
        }

        public function buy(Card $creditCard){
            $cardToUse = array_search($card, $this->creditCards);

            if($cardToUse === false){
                throw new Exception ('Card does not exist');
                return;
            }

            if($cardToUse->money < $this->totalPrice){
                throw new Exception ("You don't have enough money to purchase");
                return;
            }

            $cardtoUse->money -= $this->totalPrice;
            $this->productsPrice = 0;
            $this->expeditionsPrice = 0;
            $this->totalPrice = 0;

            $this->cart = [];
        }
    }

    class PremiumUser extends User{
        private $expeditionsPrice = 0;

        function calculatePrice(){

            //Variant that removes expedition price and adds discount to the total price

            $this->productsPrice = 0;
            $this->totalPrice = 0;

            $discount = 20;

            foreach($this->cart as $product){
                $this->productsPrice += $product->price;
            }
            $this->totalPrice = $this->productsPrice - (($this->productsPrice /100)*$discount);
        }
    }

?>