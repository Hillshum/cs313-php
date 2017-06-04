<?php require 'header.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="vote.js"></script>
<?php
require 'pageHeader.php';

$pollId = $_GET['id'];
$statement = $db->prepare("select name, question from poll where id =:id");
$statement->bindValue('id', $pollId, PDO::PARAM_INT);
$statement->execute();
$poll = $statement->fetchAll(PDO::FETCH_ASSOC)[0];

$statement = $db->prepare("select name, comment, id from response where poll_id =:id");
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


<div class="poll-data">
  <ul class="poll-responses" data-poll=<?php echo $pollId ?>>
  <?php
    foreach ($responses as $response) {
      echo '<li>'.$response['name'] . '<button class="btn" data-response='.$response['id'].'>Vote</button></li>';
    }
  ?>
  </ul>
</div>

<template id='results-template'>
  <div class="results"></div>
  <div class="name"></div>

</template>


<?php require 'footer.html' ?>