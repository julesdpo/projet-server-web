<?php

require_once 'CoreModel.php';

class ProductModel extends CoreModel
{
    protected $table = 'product';

    // Récupérer tous les produits
    public function getAllProducts()
{
    $sql = "SELECT id, name, description, picture AS image_url, price, rate FROM $this->table";
    $stmt = $this->query($sql);
    return $stmt->fetchAll();
}

public function getTable()
{
    return $this->table;
}
}
