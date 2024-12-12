<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Ecommerce</title>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">
    
    <?php
    $pageTitle = 'Bienvenue sur <span class="text-blue-400">Alibobo</span>'; 
    include __DIR__ . '/partials/header.php';
    ?>

    <main class="flex-grow">
        <section class="relative bg-gradient-to-r from-blue-500 to-green-500 text-white p-10 mb-8">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold mb-4">Découvrez nos produits</h2>
                <p class="text-lg">des articles pour tt out le monde</p>
                <a href="./produits" class="inline-block mt-6 bg-white text-blue-500 px-6 py-3 rounded-full font-bold shadow-md hover:bg-gray-100 transition-transform transform hover:scale-105">
                    Explorer les produits
                </a>
            </div>
        </section>
        <div class="flex-grow flex items-center justify-center">
        <img src="/MVC/public/assets/images/produits/download.jpg" alt="Image principale" class="max-w-4xl max-h-96 w-full object-contain">
    </div>
        
    </main>
    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>

