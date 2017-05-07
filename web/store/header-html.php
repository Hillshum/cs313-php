<html>
<head>
    <title>Shopping Center</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="nav navbar-default">
    <ul class="nav navbar-nav">
      <li class="<?php echo $page=='home' ? 'active' : ''?>"><a href="index.php">Home</a></li>
      <li class="<?php echo $page=='cart' ? 'active' : ''?>"><a href="cart.php">View Cart</a></li>
      <li class="<?php echo $page=='checkout' ? 'active' : ''?>"><a href="checkout.php">Checkout</a></li>
    </ul>
</nav>
<div class="container main">
