<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Webjump | Backend Test | Edit Category');

use \App\Entity\Category;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A CATEGORY
$obCategory = Category::getCategory($_GET['id']);

//VALIDAÇÃO DA CATEGORY
if(!$obCategory instanceof Category){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['name'])){

  $obCategory->name    = $_POST['name'];
  $obCategory->onEdit();

  header('location: CategoryList.php?status=success');
  exit;
}

include __DIR__.'/includes/header.html';
include __DIR__.'/includes/addCategory.html';
include __DIR__.'/includes/footer.html';