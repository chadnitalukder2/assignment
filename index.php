<?php

require_once 'ProductManager.php';
require_once 'Actions.php';

$productManager = new ProductManager();
$action = new Action($productManager);

$cart = $productManager->getCart();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js" defer></script>
</head>
<body>
    
<header>
    <nav class="menu-container">
      <ul class="menu">
        <li><a href="#" onclick="loadContent('home')">Home</a></li>
        <li><a href="#" onclick="loadContent('product')">Product List</a></li>
        <li><a href="#" onclick="loadContent('cart')">Cart</a></li>
      </ul>
    </nav>
  </header>

    <div id="home" class="content-container active">
        <?php
            require_once 'partials/Form.php';
        ?>
    </div>

    <div id="product" class="content-container">
       <?php 
            require_once 'partials/ProductList.php';
       ?>
    </div>

    <div id="cart" class="content-container">
       <?php 
            require_once 'partials/Cart.php';
         ?>
    </div>


    <script>
    $(document).ready(function() {
        let optionCount = 1;

        // Add option
        $('#add-option').click(function() {
            const newOption = `
                <div class="option">
                    <input type="text" name="options[${optionCount}][name]" placeholder="Option Name" required>
                    <input type="file" name="options[${optionCount}][image]" required>
                    <input type="number" name="options[${optionCount}][price]" placeholder="Price" required>
                    <button type="button" class="removeOption">Remove</button>
                </div>
            `;
            $('#optionsContainer').append(newOption);
            optionCount++;
        });

        // Remove option
        $('#optionsContainer').on('click', '.removeOption', function() {
            $(this).closest('.option').remove();
        });
    });

     // Load content
     function loadContent(section) {
        // Hide all content containers
        $('.content-container').removeClass('active');

        // Show the selected container
        $('#' + section).addClass('active');
    }
    </script>
</body>
</html>