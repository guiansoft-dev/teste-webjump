<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Webjump | Backend Test | Delete Category');

use \App\Entity\Category;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A Categoria
$obCategory = Category::getCategory($_GET['id']);

//VALIDAÇÃO DA Categoria
if(!$obCategory instanceof Category){
  header('location: CategoryList.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obCategory->onDelete();

  header('location: CategoryList.php?status=success');
  exit;
}

include __DIR__.'/includes/header.html';
include __DIR__.'/includes/confirmar-exclusao.html';
include __DIR__.'/includes/footer.html';