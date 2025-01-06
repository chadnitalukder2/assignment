<h1>Add a Product</h1>
<form id="productForm" method="POST" enctype="multipart/form-data">
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="product_name" required>

    <label for="productCategory">Product Category:</label>
    <select id="productCategory" name="product_category">
        <option value="Electronics">Electronics</option>
        <option value="Fashion">Fashion</option>
        <option value="Home">Home</option>
    </select>

    <h3 style="margin-bottom: 10px">Options</h3>
    <div id="optionsContainer">
        <div class="option">
            <input type="text" name="options[0][name]" placeholder="Option Name" required>
            <input type="file" name="options[0][image]" required>
            <input type="number" name="options[0][price]" placeholder="Price" required>
            <button type="button" class="removeOption">Remove</button>
        </div>
    </div>
    <div class="form_footer">
        <button type="button" id="add-option">Add Option</button>
        <button name="save_product" type="submit">Save Product</button>
    </div>
</form>