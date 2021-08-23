<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Webjump | Backend Test | Add Category');

use \App\Entity\Category;
$obCategory = new Category;

//VALIDAÇÃO DO POST
if(isset($_POST['name'])){

  $obCategory->name    = $_POST['name'];
  $obCategory->onSave();

  header('location: CategoryList.php');
  exit;
}

include __DIR__.'/includes/header.html';
include __DIR__.'/includes/addCategory.html';
include __DIR__.'/includes/footer.html';