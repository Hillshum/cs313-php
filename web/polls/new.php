<?php require 'header.php' ?>

<?php

require 'header.html';
if ($_SERVER['REQUEST_METHOD'] === 'POST')  {

  // Some validation here
  $ERRORS = array();
  $POLL_NAME = $_POST['poll_name'];
  if ( $POLL_NAME === '') {
    $ERRORS['name'] = 'You need to provide a name';
  }
  $POLL_QUESTION = $_POST['poll_question'];
  if ($POLL_QUESTION === '') {
    $ERRORS['question'] = 'You need to provide a question';
  }

  $POLL_RESPONSES = array();
  foreach ($_POST['poll_responses'] as $RESPONSE) {
    if ($RESPONSE != '') {
      array_push($POLL_RESPONSES, $RESPONSE);
    }
  }
  if (count($POLL_RESPONSES) < 2) {
    $ERRORS['responses'] = 'You need at least two responses';
  }

  if (count($ERRORS) == 0) {
    $poll_statement = $db->prepare("insert into poll (name, question, user_id) values (:name, :question, :user_id)" );
    $responses_statement = $db->prepare("insert into response (poll_id, name) values(:poll_id, :name)");
    $db->beginTransaction();
    try {
      $poll_statement->execute(array("name"=>$POLL_NAME, "question"=> $POLL_QUESTION, "user_id" => 1));
      $poll_id = $db->lastInsertId();
      foreach ($POLL_RESPONSES as $RESPONSE) {
        $responses_statement->execute(array("poll_id"=>$poll_id, "name"=>$RESPONSE));
      }
      $db->commit();
    }
    catch (Exception $ex)
    {
      // Please be aware that you don't want to output the Exception message in
      // a production environment
      $db->rollBack();
      echo "Error with DB. Details: $ex";
      die();
    }

    header("Location: poll.php?id=$poll_id");
  }
}

?>

<form method="post">
  <div class="name-error"><?php echo $ERRORS['name'] ?></div>
  <input placeholder="Poll Name" value="<?php echo $POLL_NAME;?>" type=text name="poll_name"/>
  <div class="question-error"><?php echo $ERRORS['question'] ?></div>
  <textarea name="poll_question" placeholder="Poll Question"><?php echo $POLL_QUESTION?></textarea>
  <ul class="create-responses">
    <li><input placeholder="Response" value="<?php echo $POLL_RESPONSES[0] ?>" type=text name="poll_responses[]"></li>
    <li><input placeholder="Response" value="<?php echo $POLL_RESPONSES[1] ?>" type=text name="poll_responses[]"></li>
    <li><input placeholder="Response" value="<?php echo $POLL_RESPONSES[2] ?>" type=text name="poll_responses[]"></li>
    <li><input placeholder="Response" value="<?php echo $POLL_RESPONSES[3] ?>" type=text name="poll_responses[]"></li>
  </ul>
  <div class="response-error"><?php echo $ERRORS['responses'] ?></div>
  <input type=submit class="btn btn-primary" value="Submit">
</form>




<?php require 'footer.html' ?>