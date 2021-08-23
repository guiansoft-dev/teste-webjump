<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Webjump | Backend Test | Edit Product');

use \App\Entity\Product;
use \App\Entity\Category;

$categories = Category::getCategories();

//VALIDAÇÃO DO ID
if(!isset($_GET['sku']) or !is_numeric($_GET['sku'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A CATEGORY
$obProduct = Product::getProduct($_GET['sku']);

//VALIDAÇÃO DA CATEGORY
if(!$obProduct instanceof Product){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['quantity'], $_POST['category'])){

  $obProduct->sku    = $_POST['sku'];
  $obProduct->name    = $_POST['name'];
  $obProduct->price    = $_POST['price'];
  $obProduct->description    = $_POST['description'];
  $obProduct->quantity    = $_POST['quantity']; 
  $obProduct->category    = $_POST['category']; 
  $obProduct->onEdit();

  header('location: ProductList.php?status=success');
  exit;
}

include __DIR__.'/includes/header.html';
include __DIR__.'/includes/addProduct.html';
include __DIR__.'/includes/footer.html';