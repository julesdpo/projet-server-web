<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Produits - Ecommerce</title>
    <link rel="shortcut icon" href="/crepe_waou/src/views/images/arbre.jpeg" type="image/x-icon">
</head>
<body class="flex flex-col min-h-screen bg-gray-50">
<?php
    $pageTitle = "Produits"; 
    include __DIR__ . '/partials/header.php';
?>

<main class="p-8 flex-grow">
    <section class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Nos Produits</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <?php foreach ($products as $product): ?>
        <div class="bg-white border rounded-lg shadow-lg hover:shadow-xl transition-shadow p-6">
            <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-48 object-cover rounded-lg mb-4">
            <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($product['name']) ?></h3>
            <p class="text-gray-600 mb-4"><?= htmlspecialchars($product['description']) ?></p>
            <p class="text-gray-800 font-bold mb-4"><?= htmlspecialchars($product['price']) ?> €</p>
            <a href="./produit?id=<?= htmlspecialchars($product['id']) ?>">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full shadow-md transition-transform transform hover:scale-105">
                    Acheter
                </button>
            </a>
        </div>
    <?php endforeach; ?>
</div>

    </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
