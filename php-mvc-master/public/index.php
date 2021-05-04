<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';
session_start();

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Shop
$router->add('/login', ['controller' => 'CustomerController', 'action' => 'login']);
$router->add('/logout', ['controller' => 'CustomerController', 'action' => 'logout']);
$router->add('/register', ['controller' => 'CustomerController', 'action' => 'register']);
$router->add('/Contact', ['controller' => 'CustomerController', 'action' => 'view']);

$router->add('/index', ['controller' => 'ProductController', 'action' => 'index']);
$router->add('/categories', ['controller' => 'CategoryController', 'action' => 'view']);
$router->add('/categories/{id:\d+}', ['controller' => 'CategoryController', 'action' => 'proCate']);

$router->add('/', ['controller' => 'ProductController', 'action' => 'index']);
$router->add('/products', ['controller' => 'ProductController', 'action' => 'index']);

$router->add('/preview/{id:\d+}', ['controller' => 'ProductController', 'action' => 'preview']);
$router->add('/cart', ['controller' => 'CartController', 'action' => 'index']);
$router->add('/cart/{id:\d+}', ['controller' => 'CartController', 'action' => 'delete']);
$router->add('/checkout', ['controller' => 'CartController', 'action' => 'checkout']);


// Start user admin
$router->add('/admin', ['controller' => 'UserController', 'action' => 'view']);
$router->add('/admin/index', ['controller' => 'UserController', 'action' => 'view']);
$router->add('/admin/login', ['controller' => 'UserController', 'action' => 'login']);
$router->add('/admin/logout', ['controller' => 'UserController', 'action' => 'logout']);
// End user admin


// Start Category admin
$router->add('/admin/catlist', ['controller' => 'AdminCategoryController', 'action' => 'view']);
$router->add('/admin/catlist/{id:\d+}', ['controller' => 'AdminCategoryController', 'action' => 'delete']);
$router->add('/admin/catadd', ['controller' => 'AdminCategoryController', 'action' => 'add']);
$router->add('/admin/catadd/{id:\d+}', ['controller' => 'AdminCategoryController', 'action' => 'update']);
// End Category Admin

//  Start Product admin
$router->add('/admin/productlist', ['controller' => 'AdminProductController', 'action' => 'view']);
$router->add('/admin/productlist/{id:\d+}', ['controller' => 'AdminProductController', 'action' => 'delete']);
$router->add('/admin/productadd/{id:\d+}', ['controller' => 'AdminProductController', 'action' => 'update']);
$router->add('/admin/productadd', ['controller' => 'AdminProductController', 'action' => 'add']);
// End Product admin

$router->add('/admin/cartlist', ['controller' => 'AdminCartController', 'action' => 'view']);
//$router->add('/admin/cartlist/{id:\d+}', ['controller' => 'AdminCartController', 'action' => 'view']);




$router->dispatch($_SERVER['REQUEST_URI']);
