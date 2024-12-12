<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="shortcut icon" href="../images/arbre.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <?php
        $pageTitle = "Connexion"; 
        include __DIR__ . '/partials/header.php';
    ?>

    <main class="flex-grow flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
            <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>
            
            <?php if (!empty($error)): ?>
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="/MVC/public/connexion" method="post">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Adresse e-mail:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700">Mot de passe:</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition-all">Se connecter</button>
            </form>
            <p class="text-center mt-4 text-gray-600">
                Vous n'avez pas de compte ?
                <a href="./inscription" class="text-blue-500 hover:underline">Inscrivez-vous</a>
            </p>
        </div>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
