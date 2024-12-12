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
                <?php if (isset($product)): ?>
                <img src="<?= htmlspecialchars($product['picture']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full md:w-1/2 h-80 object-cover rounded-lg shadow-md mb-6 md:mb-0">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4"><?= htmlspecialchars($product['name']) ?></h1>
                 
                    <p class="text-gray-600 mb-6"><?= htmlspecialchars($product['description']) ?></p>
                    <h3 class="text-2xl font-bold text-green-600 mb-6"><?= htmlspecialchars($product['price']) ?> €</h3>
                    <?php else: ?>
                        <p>Produit non trouvé.</p>
                    <?php endif; ?>
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
                name: "<?= htmlspecialchars($product['name']) ?>",
                price: <?= htmlspecialchars($product['price']) ?>,
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
