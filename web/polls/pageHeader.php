<html>
  <head>
    <title>Polls for days</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel=stylesheet href="style.css">
  </head>
  <body>
    <nav class="nav navbar-default">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Home</a></li>
        <li ><a href="new.php">Create Poll</a></li>
        <?php 
          if (isset($USER)) { 
              echo '<li ><a href="logout.php">Log Out</a></li>';
          } else {
              echo '<li ><a href="login.php">Log In</a></li>';
          }
        ?>
      </ul>
    </nav>


    <div class="container main">
