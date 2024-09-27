<?php

class productView{

    public function showProducts($products){
     require "./app/templates/productList.phtml";
    }

    public function showDetails ($products){
     require "./app/templates/productDetail.phtml";
    }

}