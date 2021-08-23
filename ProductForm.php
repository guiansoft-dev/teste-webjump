<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Webjump | Backend Test | Add Product');

use \App\Entity\Product;
use \App\Entity\Category;

$obProduct = new Product;

$categories = Category::getCategories();


//VALIDAÇÃO DO POST
if(isset($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['quantity'], $_POST['category'])){

  $obProduct->sku            = $_POST['sku'];
  $obProduct->name           = $_POST['name'];
  $obProduct->price          = $_POST['price'];
  $obProduct->description    = $_POST['description'];
  $obProduct->quantity       = $_POST['quantity'];
  $obProduct->category       = $_POST['category'];
  $obProduct->onSave();

  header('location: ProductList.php');
  exit;
}

include __DIR__.'/includes/header.html';
include __DIR__.'/includes/addProduct.html';
include __DIR__.'/includes/footer.html';