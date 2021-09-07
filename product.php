<?php

    class Product{
        public $name;
        public $brand;
        public $price;
        public $productType;

        function __construct(string $name, string $brand, float $price, string $productType){
            $this->name = $name;
            $this->brand = $brand;
            $this->price = $price;
            $this->productType = $productType;
        }
    }

?>