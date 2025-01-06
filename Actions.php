<?php
class Action {
    private $productManager;

    public function __construct($productManager)
    {
        $this->productManager = $productManager;
        $this->actions();
    }

    public function actions() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['save_product'])) {
                $productName = $_POST['product_name'];
                $productCategory = $_POST['product_category'];
                $options = $_POST['options'] ?? [];
        
                $this->productManager->addProduct($productName, $productCategory, $options);
            }
        
            if (isset($_POST['add_to_cart'])) {
                $option_id = $_POST['option_id'];
                $this->productManager->addToCart($option_id);
            }
        
            if (isset($_POST['remove_from_cart'])) {
                $option_id = $_POST['option_id'];
                $this->productManager->removeFromCart($option_id);
            }
        }
    }
}