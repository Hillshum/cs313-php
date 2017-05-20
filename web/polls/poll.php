<?php require 'header.php' ?>

<?php

$pollId = $_GET['id'];
$statement = $db->prepare("select name, question from poll where id =:id");
$statement->bindValue('id', $pollId, PDO::PARAM_INT);
$statement->execute();
$poll = $statement->fetchAll(PDO::FETCH_ASSOC)[0];

$statement = $db->prepare("select name, comment from response where poll_id =:id");
$statement->bindValue('id', $pollId, PDO::PARAM_INT);
$statement->execute();
$responses = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="poll-name"><?php echo $poll['name'] ?></div>
<div class="poll-question"><?php echo $poll['question'] ?></div>

<?
function formatResponse($response) {
  echo $response['name'];
}
?>


<ul class="poll-responses">
<?php
  foreach ($responses as $response) {
    echo '<li>'.$response['name'] . '</li>';
  }
?>
</ul>


<?php require 'footer.html' ?>