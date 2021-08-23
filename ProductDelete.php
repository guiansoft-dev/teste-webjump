<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Webjump | Backend Test | Delete Product');

use \App\Entity\Product;

//VALIDAÇÃO DO sku
if(!isset($_GET['sku']) or !is_string($_GET['sku'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A Product
$obProduct = Product::getProduct($_GET['sku']);

//VALIDAÇÃO DA Product
if(!$obProduct instanceof Product){
  header('location: ProductList.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['delete'])){

  $obProduct->onDelete();

  header('location: ProductList.php?status=success');
  exit;
}

include __DIR__.'/includes/header.html';
include __DIR__.'/includes/confirmarExclusaoProduct.html';
include __DIR__.'/includes/footer.html';