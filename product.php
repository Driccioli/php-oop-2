<?php

    class Product{
        public $name;
        public $brand;
        public $price;
        public $expeditionPrice;
        public $productType;

        function __construct(string $name, string $brand, float $price, float $expeditionPrice, string $productType){
            $this->name = $name;
            $this->brand = $brand;
            $this->price = $price;
            $this->expeditionPrice = $expeditionPrice;
            $this->productType = $productType;
        }
    }

?>