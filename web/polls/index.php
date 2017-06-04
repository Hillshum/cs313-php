<?php require 'header.php' ?>

<?php
require 'pageHeader.php';

$statement =$db->prepare("select name, id from poll");

$statement->execute();
?>

<ul class="polls-list">
  <?php
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      echo '<li>';
      echo '<a href="poll.php?id=' . $row['id'] . '">' . $row['name'] . '</a>';
      echo '</li>';
    }
  ?>
</ul>


<?php require 'footer.html' ?>