<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
  <link rel="stylesheet" type="text/css" href="./style/styles.css" />
  <!-- Include any CSS stylesheets or meta tags -->
</head>
<body>
<style>

    .hidden {
      display: none;
    }
  </style>

  <form id="product_form" action="/Add-Products/process_product.php" method="post">
  <ul id="list">
    <li class="btn-list"><h1>Product Add</h1></li>
    <li class="btn-list"  style="margin-left:90%;"> <button type="submit">Save</button> </li>
        <li class="btn-list"><a href="../">Cancel</a></li>
</ul>
<hr>
<div class="ProductForm">
    <label for="sku">SKU:</label>
    <input type="text" id="sku" name="sku" required>
</br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    </br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required>
    </br>
    <label for="productType">Product Type:</label>
      <select id="productType" name="productType" onchange="changeForm()">
      <option default>Type Switcher</option>
        <option value="DVD" >DVD</option>
        <option value="Book">Book</option>
        <option value="Furniture">Furniture</option>
      </select>

      <div id="productType">
        <div id="sizeContainer" class="hidden">
          <label for="size">Size (MB):</label>
          <input type="text" id="size" name="size" >
          <p>Please provide Size in Megabyte format</p>
        </div>

        <div id="weightContainer" class="hidden">
          <label for="weight">Weight (Kg):</label>
          <input type="text" id="weight" name="weight" >
          <p>Please provide Weight in Kilogram</p>
        </div>

        <div id="dimensionsContainer" class="hidden">
          <label for="height">Height (cm):</label>
          <input type="text" id="height" name="height" >
          
           </br>
          <label for="width">Width (cm):</label>
          <input type="text" id="width" name="width" >
          </br>
          <label for="length">Length (cm):</label>
          <input type="text" id="length" name="length" >
          <p>Please provide dimensions in HxWxL format</p>
      </div>
    </div>
</div>
  </form>

  <script>
  function changeForm() {
    var productType = document.getElementById("productType").value;
    var sizeContainer = document.getElementById("sizeContainer");
    var weightContainer = document.getElementById("weightContainer");
    var dimensionsContainer = document.getElementById("dimensionsContainer");

    // Hide all attribute containers
    sizeContainer.classList.add("hidden");
    weightContainer.classList.add("hidden");
    dimensionsContainer.classList.add("hidden");

    // Remove "required" attribute from all input fields
    var inputFields = document.querySelectorAll("#productType input");
    inputFields.forEach(function(input) {
      input.removeAttribute("required");
    });

    // Show the corresponding attribute container based on the selected product type
    if (productType === "DVD") {
      sizeContainer.classList.remove("hidden");
      var sizeInput = document.getElementById("size");
      sizeInput.setAttribute("required", "required");
    } else if (productType === "Book") {
      weightContainer.classList.remove("hidden");
      var weightInput = document.getElementById("weight");
      weightInput.setAttribute("required", "required");
    } else if (productType === "Furniture") {
      dimensionsContainer.classList.remove("hidden");
      var heightInput = document.getElementById("height");
      var widthInput = document.getElementById("width");
      var lengthInput = document.getElementById("length");
      heightInput.setAttribute("required", "required");
      widthInput.setAttribute("required", "required");
      lengthInput.setAttribute("required", "required");
    }
  }
</script>


</body>
</html>
