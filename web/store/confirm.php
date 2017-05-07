<?php require 'header-php.php';?>
<?php $page="confirm"; ?>
<?php require 'header-html.php';?>


<div class="confirm-header">Thank you for your purchase</div>

<div class="confirm-address">
  <div class="address-header">Your order will be shipped to:</div>
  <div class="address-firstname"><?php echo $_SESSION['customer']['firstName']?></div>
  <div class="address-lastname"><?php echo $_SESSION['customer']['lastName']?></div>
  <div class="address-street"><?php echo $_SESSION['customer']['street']?></div>
  <div class="address-city"><?php echo $_SESSION['customer']['city']?></div>
  <div class="address-state"><?php echo $_SESSION['customer']['state']?></div>
  <div class="address-zip"><?php echo $_SESSION['customer']['zip']?></div>
</div>


<ul class="product-list">
  <div class="confirm-products-header">You ordered:</div>
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
