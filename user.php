<?php

    class User{
        public $userName;
        private $country;
        private $addresses = [];

        private $premium;
        private $cart = [];

        private $productsPrice;
        private $expeditionPrice;
        private $totalPrice;

        function __construct(string $userName, string $country, array $addresses, bool $premium){
            $this->userName = $userName;
            $this->country = $country;
            $this->addresses = $addresses;
            $this->premium = $premium;
        }

        function addProduct(Product $product, int $quantity){
            for($i=1;$i<$quantity;$i++){
                array_push($this->cart,$product);
            }
            //Todo: Add function that recalculates prices
        }

        function removeProduct(Product $product, $quantity){
            for($i=1;$i<$quantity;$i++){
                $productToDelete = array_search($product, $this->cart);
                if($productToDelete === false){
                    throw new Exception ('Product does not exist');
                    break;
                }
                unset($productToDelete);
                array_values($this->cart);
            }
            //Todo: Add function that recalculates prices
        }
    }

?>