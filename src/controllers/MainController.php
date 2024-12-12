<?php

require_once __DIR__ . '/../model/ProductsModel.php'; 
require_once __DIR__ . '/../model/UserModel.php'; 


class MainController
{
    // Page d'accueil
    public function home()
    {
        $this->render('home');
    }

    public function produits()
    {
        $productModel = new ProductModel();

        $products = $productModel->getAllProducts();

        $this->render('produits', ['products' => $products]);
    }

    public function produit()
{
    // Récupérer l'ID depuis l'URL
    $id = $_GET['id'] ?? null;

    if (!$id) {
        $this->render('404');
        return;
    }

    // Instancier le modèle
    $productModel = new ProductModel();

    // Utiliser la méthode `getTable()` pour récupérer le nom de la table
    $product = $productModel->findById($productModel->getTable(), $id);

    if (!$product) {
        $this->render('404');
        return;
    }

    $this->render('produit', ['product' => $product]);
}




    public function panier()
    {
        $this->render('panier');
    }

    public function inscriptionok()
    {
        $this->render('inscriptionok');
    }

    public function inscription()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Valider les champs
        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            $error = "Tous les champs sont requis.";
        } elseif ($password !== $confirmPassword) {
            $error = "Les mots de passe ne correspondent pas.";
        } else {
            // Hash du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insérer dans la base de données
            $userModel = new UserModel(); // Assurez-vous d'avoir un modèle UserModel
            $userModel->registerUser($username, $email, $hashedPassword);
            
            header('Location: ./inscriptionok');
            exit;
        }
    }

    $this->render('inscription', ['error' => $error ?? null]);
}


public function connexion()
{
    // soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer et nettoyer les données
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Instancier le modèle utilisateur
        $userModel = new UserModel();
        $user = $userModel->findUserByEmail($email);

        // Vérification de l'utilisateur et du mot de passe
        if ($user && password_verify($password, $user['password'])) {
            // Initialisation de la session
            session_start();
            $_SESSION['user'] = $user;

            // Redirection après connexion réussie
            header('Location: /MVC/public/');
            exit;
        } else {
            // Retourner une erreur si identifiants incorrects
            $this->render('connexion', ['error' => 'Identifiants incorrects.']);
        }
    } else {
        
        $this->render('connexion');
    }
}

public function deconnexion()
{
    session_start();
    session_destroy(); // fin session
    header('Location: /MVC/public/connexion'); // Redirige vers la page de connexion
    exit;
}

    public function about()
    {
        $this->render('about');
    }

    public function notFound()
    {
        http_response_code(404);
        echo "404 - Page Not Found!";
    }

    private function render($view, $data = [])
    {
        extract($data);

        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "View not found: $view";
        }
    }
}
