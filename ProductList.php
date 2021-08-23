<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Webjump | Backend Test | Products');

use \App\Entity\Product;

$products = Product::getProducts();


include __DIR__.'/includes/header.html';
include __DIR__.'/includes/products.html';
include __DIR__.'/includes/footer.html';