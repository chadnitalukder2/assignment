<?php
$productManager = new ProductManager();
$products = $productManager->getProducts();
?>

<h1>Product List</h1>
<div id="productList">
    <table class="product-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Option Name</th>
                <th>Option Image</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <?php foreach ($product['options'] as $option): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['category']) ?></td>
                        <td><?= htmlspecialchars($option['name']) ?></td>
                        <td>
                            <img src="uploads/<?= htmlspecialchars($option['image']) ?>" alt="<?= htmlspecialchars($option['name']) ?>" width="50" height="50">
                        </td>
                        <td><?= htmlspecialchars($option['price']) ?></td>
                        <td>
                            <form method="POST" class="add_to_cart">
                                <input type="hidden" name="option_id" value="<?= htmlspecialchars($option['id']) ?>">
                                <button type="submit" name="add_to_cart">Add to Cart</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
