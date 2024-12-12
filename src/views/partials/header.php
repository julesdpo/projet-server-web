<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="/crepe_waou/public/styles.css">
</head>
<body>
<header class="bg-gradient-to-r from-blue-800 to-gray-800 text-white p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-4xl font-extrabold"><?php echo $pageTitle ?? 'Mon Site'; ?></h1>
        <div>
            <?php if (isset($_SESSION['user'])): ?>
                <!-- Utilisateur connecté -->
                <span class="text-lg font-semibold mr-4">Bienvenue, <?= htmlspecialchars($_SESSION['user']['username']); ?>!</span>
                <a href="./deconnexion">
                    <button class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-full shadow-md transition-transform transform hover:scale-105">
                        Déconnexion
                    </button>
                </a>
            <?php else: ?>
                <!-- Pas connecté -->
                <a href="./connexion">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-full shadow-md transition-transform transform hover:scale-105">
                        Connexion
                    </button>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<nav class="bg-gray-700 text-white py-3 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <ul class="flex space-x-6 font-medium">
            <li><a href="./" class="hover:text-blue-400 transition-colors">Accueil</a></li>
            <li><a href="./produits" class="hover:text-blue-400 transition-colors">Produits</a></li>
        </ul>
        <a href="./panier">
            <button class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-full shadow-md transition-transform transform hover:scale-105">
                Panier
            </button>
        </a>
    </div>
</nav>
