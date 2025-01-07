<?php

class ProductManager
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=assignment;charset=utf8';
        $username = 'root';
        $password = '1234';
        
        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function addProduct($name, $category, $options)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, category) VALUES (:name, :category)");
        $stmt->execute(['name' => $name, 'category' => $category]);

        $productId = $this->pdo->lastInsertId();

        foreach ($options as $index => $option) {
            $file = $_FILES['options']['tmp_name'][$index]['image'];
            $fileName = $_FILES['options']['name'][$index]['image'];
            $image = ['tmp_name' => $file, 'name' => $fileName];
            
            $imageName = $this->uploadImage($image);

            $stmt = $this->pdo->prepare(
                "INSERT INTO product_options (product_id, name, image, price) VALUES (:product_id, :name, :image, :price)"
            );
            $stmt->execute([
                'product_id' => $productId,
                'name' => $option['name'],
                'image' => $imageName,
                'price' => $option['price'],
            ]);
        }
    }

    public function getProducts()
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as &$product) {
            $stmt = $this->pdo->prepare("SELECT * FROM product_options WHERE product_id = :product_id");
            $stmt->execute(['product_id' => $product['id']]);
            $product['options'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $products;
    }

    public function addToCart($optionId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM product_options WHERE id = :id");
        $stmt->execute(['id' => $optionId]);
        $option = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($option) {
            $stmt = $this->pdo->prepare(
                "INSERT INTO cart (option_id, name, price) VALUES (:option_id, :name, :price)"
            );
            $stmt->execute([
                'option_id' => $option['id'],
                'name' => $option['name'],
                'price' => $option['price'],
            ]);
        }
    }

    public function removeFromCart($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM cart WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function getCart()
    {
        $stmt = $this->pdo->query("SELECT * FROM cart");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function uploadImage($file)
    {
        $targetDir = 'uploads/';
        $fileName = time() . '_' . basename($file['name']);
        $targetFile = $targetDir . $fileName;
        
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $fileName;
        } else {
            throw new Exception("Failed to upload image.");
        }
    }
}