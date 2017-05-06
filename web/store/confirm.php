<?php require 'header-php.php';?>
<?php require 'header-html.php';?>


<div>Thank you for your purchase</div>


<ul class="product-list">
<?php
foreach ($_SESSION['cart'] as $key => $value) {
    $product = $json[$value];
    echo "<li class='product-item'>";
    echo "<div class='product-name'>". $product["name"].  "</div>";
    echo "<div class='product-description'>". $product["description"].  "</div>";
    echo "<div class='product-price'>$". (string)$product["cost"] /100 .  "</div>";
    echo "</li>";
}
$_SESSION['cart'] = array();
?>
</ul>



<?php require 'footer.php';?>
