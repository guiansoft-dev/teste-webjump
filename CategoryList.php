<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Webjump | Backend Test | Category');

use \App\Entity\Category;

$categories = Category::getCategories();


include __DIR__.'/includes/header.html';
include __DIR__.'/includes/categories.html';
include __DIR__.'/includes/footer.html';