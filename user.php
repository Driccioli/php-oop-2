<?php

    class User{
        public $userName;
        private $country;
        private $addresses = [];

        private $cart = [];

        private $productsPrice;
        private $expeditionsPrice;
        private $totalPrice;

        function __construct(string $userName, string $country, array $addresses){
            $this->userName = $userName;
            $this->country = $country;
            $this->addresses = $addresses;
        }

        public function addProduct(Product $product, int $quantity){
            for($i=1;$i<$quantity;$i++){
                array_push($this->cart,$product);
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
                $this->expeditionsPrice += $product->expeditionprice;
            }
            $this->totalPrice = $this->productsPrice + $this->expeditionsPrice;
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