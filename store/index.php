<?php require 'header.php';?>

this is some content

<form action="cart.php" method="post">
<ul class="product-list">
<?php
$productStr = file_get_contents('products.json');

//echo $productStr;

$json =  json_decode($productStr, true);


foreach ($json as $key => $value) {
    echo "<li class='product-item'>";

    echo "<div class='product-name'>". $value["name"].  "</div>";
    echo "<div class='product-description'>". $value["description"].  "</div>";
    echo "<div class='product-price'>$". (string)$value["cost"] /100 .  "</div>";
    echo "<input type=submit name='". $value['name'] ."' class='btn add-cart-btn'>Add to Cart</a>";

    echo "</li>";
}
?>
</ul>
</form>

<?php require 'footer.php';?>

