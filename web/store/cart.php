<?php require 'header-php.php';?>
<?php

if (isset($_POST['addproduct']) && isset($_POST['product']))  {
    $_SESSION['cart'][] = $_POST['product'];
    header("Location: cart.php");
    exit();
}

if (isset($_POST['remove']) && isset($_POST['product'])) {
    $key = array_search($_POST['product'], $_SESSION['cart']);
    unset($_SESSION['cart'][$key]);
    header("Location: cart.php");
    exit();
}
?>
<?php $page="cart"; ?>
<?php require 'header-html.php';?>


<div class="cart-header">Check out your cart!</div>

<ul class="product-list">
<?php
foreach ($_SESSION['cart'] as $key => $value) {
    $product = $json[$value];
    echo "<li class='product-item'><form action='cart.php' method='post'>";
    echo "<div class='product-name'>". $product["name"].  "</div>";
    echo "<div class='product-description'>". $product["description"].  "</div>";
    echo "<div class='product-price'>$". (string)$product["cost"] /100 .  "</div>";
    echo "<input type=submit name='remove' class='btn cart-btn' value='Remove from cart'>";
    echo "<input type=hidden name='product' value='". $product['name'] ."'class='btn cart-btn' value='Remove from cart'>";

    echo "</form></li>";
}
?>
</ul>

<?php require 'footer.php';?>
