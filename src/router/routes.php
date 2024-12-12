<?php

require_once __DIR__ . '/../controllers/MainController.php';

$router = new AltoRouter();

// base path 
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/about', 'MainController#about', 'about');
$router->map('GET', '/produits', 'MainController#produits', 'produits');
$router->map('GET', '/produit', 'MainController#produit', 'produit');
$router->map('GET', '/panier', 'MainController#panier', 'panier');
$router->map('GET|POST', '/connexion', 'MainController#connexion', 'connexion');
$router->map('GET|POST', '/inscription', 'MainController#inscription', 'inscription');
$router->map('GET', '/inscriptionok', 'MainController#inscriptionok', 'inscriptionok');
$router->map('GET', '/deconnexion', 'MainController#deconnexion', 'deconnexion');



return $router;
