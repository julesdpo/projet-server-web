<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="shortcut icon" href="../images/arbre.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <?php
        $pageTitle = "Inscription"; 
        include __DIR__ . '/partials/header.php';
    ?>

    <main class="flex-grow flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
            <h2 class="text-2xl font-bold mb-6 text-center">Inscription</h2>

            <?php if (!empty($error)): ?>
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="/MVC/public/inscription" method="post">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Adresse e-mail:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Mot de passe:</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="confirm-password" class="block text-gray-700">Confirmer le mot de passe:</label>
                    <input type="password" id="confirm-password" name="confirm_password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition-all">S'inscrire</button>
            </form>
            <p class="text-center mt-4 text-gray-600">
                Vous avez déjà un compte ?
                <a href="./connexion" class="text-blue-500 hover:underline">Connectez-vous</a>
            </p>
        </div>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
