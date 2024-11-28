<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="shortcut icon" href="/crepe_waou/src/views/images/arbre.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <?php
        $pageTitle = "Panier"; 
        include __DIR__ . '/partials/header.php';
        ?>
    </header>

    <main class="container mx-auto p-8 flex-grow">
        <h2 class="text-3xl font-bold text-center mb-8">Récapitulatif de votre panier</h2>
        <div id="cart" class="bg-white shadow-lg rounded-lg p-6">
        </div>
        <div class="mt-8 flex justify-between">
            <a href="./produits">
                <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-full shadow-md transition-transform transform hover:scale-105">
                    Retour
                </button>
            </a>
            <button onclick="checkout()" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full shadow-md transition-transform transform hover:scale-105">
                Passer à la caisse
            </button>
        </div>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>


    <script>
        function displayCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartDiv = document.getElementById('cart');

            if (cart.length === 0) {
                cartDiv.innerHTML = `
                    <p class="text-center text-gray-600 text-lg">Votre panier est vide.</p>
                `;
                return;
            }

            let cartContent = '<ul class="space-y-6">';
            cart.forEach((item, index) => {
                cartContent += `
                    <li class="flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow-sm">
                        <div>
                            <p class="font-bold text-xl">${item.name}</p>
                            <p class="text-gray-600">Prix unitaire: ${item.price}€</p>
                            <p class="text-gray-600">Quantité: ${item.quantity}</p>
                            <p class="font-semibold text-green-600 mt-2">Total: ${item.price * item.quantity}€</p>
                        </div>
                        <button onclick="removeFromCart(${index})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full shadow-md transition-transform transform hover:scale-105">
                            Supprimer
                        </button>
                    </li>
                `;
            });
            cartContent += '</ul>';

            cartDiv.innerHTML = cartContent;
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            displayCart();
        }

        function checkout() {
            alert('Passer à la caisse - fonctionnalité à implémenter');
        }

        displayCart();
    </script>
</body>
</html>
