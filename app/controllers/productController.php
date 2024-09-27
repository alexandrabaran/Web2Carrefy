<?php

require_once './app/views/productView.php';
require_once "./app/models/productModel.php";
require_once  "./app/views/errorView.php";

class productController {
   private $prodView;
   private $prodModel;
   private $errorView;

   public function __construct(){
      
   $this->prodView = new productView();
   $this->prodModel = new productModel();
   $this->errorView = new errorView();
  }

//metodos publicos

   public function showProducts (){
      $products = $this->prodModel->getAllProducts();
      $this->prodView->showProducts($products); 
   }

   public function showDetails($id){
      $products = $this->prodModel->getProduct($id);
      $this->prodView->showDetails($products);
   }


//acciones de admin

   public function addProduct (){
      //verificar

      if(isset($_POST)){ //verifica form de add
         $name = $_POST['name'];  
         $category = $_POST['category'];
         $price = $_POST['price'];
         $quantity = $_POST['stock'];
     }

     if(empty($name)||empty($category)||empty($price)||empty($stock)){ //si hay empty tira error
         $this->errorView->showError("Complete todos los campos");
         return;
     }

     $id = $this->prodModel->addProduct($name, $category, $price, $stock);

     if($id){
         header('Location: ' . BASE_URL . 'home');
     } else {
         $this->errorView->showError("Error al insertar el producto");
     }        
    }

   public function deleteProduct($id){ //cambiar nombre a remove??
      //verify

      $this->prodModel-> deleteProduct($id);
      header('Location: ' . BASE_URL . 'home');
   }

   public function updateProduct ($id){
      //verify
      if(!empty($_POST['name'])&&!empty($_POST['category'])&&!empty($_POST['price'])){

         $name = $_POST['name'];
         $category = $_POST['category'];
         $price = $_POST['price'];
         $stock = $_POST['stock'];

         $this->prodModel->updateProduct($name, $stock, $price, $category, $id);
         header('Location: ' . BASE_URL . 'home');

   }
   }
}