<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" type="text/css" href="./style/styles.css" />
</head>
<body>
    <ul id="list">
    <li class="btn-list"><h1>Product List</h1></li>
    <li class="btn-list" style="margin-left:90%;"> <a href="./add_product"><button>ADD</button></a></Br></li>
    <form action="./ProductList/delete_products.php" method="post" id="mass-delete-form"> 
       <li class="btn-list">
         <button type="submit" style="width:110px;">MASS DELETE</button>
        </li>
</ul>
        <hr>
        <ul id="Products">
            <?php foreach ($products as $product) { ?>
                <li id="ProductList">
                <input type="checkbox" name="product_ids[]" value="<?php echo $product->getSKU(); ?>" class="delete-checkbox"></br>
                    <strong>SKU:</strong> <?php echo $product->getSKU(); ?><br>
                    <strong>Name:</strong> <?php echo $product->getName(); ?><br>
                    <strong>Price:</strong> $<?php echo $product->getPrice(); ?><br>
                    <strong><?php echo $product->getAttribute(); ?>:</strong> <?php echo $product->getValue(); ?>
                </li>
            <?php } ?>
        </ul>
    </form>

    <script>
        document.getElementById('mass-delete-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var checkboxes = document.getElementsByClassName('delete-checkbox');
            var checkedIds = [];
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checkedIds.push(checkboxes[i].value);
                }
            }
            if (checkedIds.length > 0) {
                document.getElementById('mass-delete-form').submit();
            } else {
                alert('Please select at least one product to delete.');
            }
        });
    </script>

</body>
</html>
