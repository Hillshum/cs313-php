<?php require 'header-php.php';?>
<?php $page="home"; ?>
<?php require 'header-html.php';?>


<ul class="product-list">
<?php

foreach ($json as $key => $value) {
    echo "<li class='product-item'><form action='cart.php' method='post'>";
    echo "<div class='product-name'>". $value["name"].  "</div>";
    echo "<div class='product-description'>". $value["description"].  "</div>";
    echo "<div class='product-price'>$". (string)$value["cost"] /100 .  "</div>";
    echo "<input type=submit  name='addproduct' class='btn cart-btn' value='Add to cart'>";
    echo "<input type=hidden name='product' value='$key'class='btn cart-btn' value='Remove from cart'>";

    echo "</form></li>";
}
?>
</ul>

<?php require 'footer.php';?>
