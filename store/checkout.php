<?php require 'header-php.php';?>

<?php

if  (isset($_POST['checkout'])) {

  // TODO: add some validation and processing here
  
    header("Location: confirm.php");
    exit();
}

?>

<?php require 'header-html.php';?>

<form method='POST'>

  <input placeholder="First Name" name="firstName">
  <input placeholder="Last Name" name="lastName">
  <input placeholder="Street Address" name="street">
  <input placeholder="City" name="city">
  <input placeholder="State" name="state">
  <input placeholder="Zip Code" name="zip">

  <input type=submit name="checkout" value="Complete Checkout">

</form>
<?php require 'footer.php';?>
