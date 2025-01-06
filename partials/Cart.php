<?php
require_once 'ProductManager.php';

$productManager = new ProductManager();
$cart = $productManager->getCart();
?>


<h1>Cart</h1>
<div id="cart" class="cart_wrapper">
    <?php foreach ($cart as $item): ?>
        <div class="cartItem">
            <div class="card">
                <h3><?= htmlspecialchars($item['name']) ?></h3>
                <p><strong>Price:</strong> <?= htmlspecialchars($item['price']) ?></p>
                <form method="POST" class="remove_from_cart">
                    <input type="hidden" name="option_id" value="<?= htmlspecialchars($item['id']) ?>">
                    <button type="submit" name="remove_from_cart">Remove from Cart</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>