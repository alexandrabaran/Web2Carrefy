
<?php

require_once "./app/controllers/homeController.php";
require_once "./app/controllers/productController.php";

define ('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//TABLA DE RUTEO

//home -->                   homeController-->     showHome();
//products-list -->          productController-->  showProducts();
//product-details/:ID->      productController-->  showDetails(id);
//add-product -->            productController-->  addProduct();
//delete-product/:ID -->     productController-->  deleteProduct(id);
//update-product/:ID -->     productController-->  updateProduct(id);

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);

    switch($params[0]){
        case 'home':
            $controller = new HomeController();
            $controller -> showHome();
            break;
        case 'products-list':
            $controller = new productController();
            $controller->showProducts();
            break;
        case 'product-details':
            $controller = new productController();
            $controller->showDetails($params[1]);
            break;
        case 'add-product':
            $controller = new productController();
            $controller->addProduct();
            break;
        case 'delete-product':
            $controller = new productController();
            $controller->deleteProduct($params[1]);
            break;
        case 'update-product':
            $controller = new productController();
            $controller->updateProduct($params[1]);
            break;
        default: 
            echo "404 Page Not Found";
            break;
    }
?>