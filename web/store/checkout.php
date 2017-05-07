<?php require 'header-php.php';?>

<?php
function parse_field($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if  (isset($_POST['checkout'])) {

  $_SESSION['customer'] = array(
    'firstName' => parse_field($_POST['firstName']),
    'lastName' => parse_field($_POST['lastName']),
    'street' => parse_field($_POST['street']),
    'city' => parse_field($_POST['city']),
    'zip' => parse_field($_POST['zip'])
  );

  $valid = True;



  if ($valid) {
    header("Location: confirm.php");
    exit();
  }
}

?>

<?php
$page="checkout";
 require 'header-html.php';
 ?>

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
