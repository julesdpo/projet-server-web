<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit - Notre Boutique</title>
    <link rel="shortcut icon" href="../images/arbre.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
<?php
        $pageTitle = "Notre Boutique"; 
        include __DIR__ . '/partials/header.php';
        ?>
    
    <main class="container mx-auto p-8 flex-grow">
        <section class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <div class="flex flex-col md:flex-row md:items-start md:space-x-8">
                <img src="../images/arbre.jpeg" alt="Image du produit" class="w-full md:w-1/2 h-80 object-cover rounded-lg shadow-md mb-6 md:mb-0">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">Produit 1</h1>
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Description</h2>
                    <p class="text-gray-600 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada.</p>
                    <h3 class="text-2xl font-bold text-green-600 mb-6">Prix: 777€</h3>
                    <button onclick="addToCart()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg transition-transform transform hover:scale-105">
                        Ajouter au Panier
                    </button>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>


    <script>
        function addToCart() {
            const product = {
                name: "Produit 1",
                price: 777,
                quantity: 1,
            };

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            const existingProductIndex = cart.findIndex(item => item.name === product.name);
            if (existingProductIndex > -1) {
                cart[existingProductIndex].quantity += 1;
            } else {
                cart.push(product);
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Produit ajouté au panier !');
        }
    </script>
</body>
</html>
