<?php require 'header.php' ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {

  $data = json_decode(file_get_contents('php://input'), true);

  // Some validation here
  $ERRORS = array();
  $POLL_ID = $data['poll_id'];
  if (!isset($POLL_ID) || $POLL_ID === '') {
    $ERRORS['poll'] = 'You need to provide an id';
  }

  $RESPONSE_ID = $data['response_id'];
  if (!isset($RESPONSE_ID) || $RESPONSE_ID === '') {
    $ERRORS['response'] = 'You need to provide a question';
  }

  // Check to make sure the poll and response match
  $validate_statement = $db->prepare("select count(*) from response where  (id=:id and poll_id=:poll_id)");
  $validate_statement->execute(array("id"=>$RESPONSE_ID, "poll_id"=>$POLL_ID));
  if ( $validate_statement->fetchColumn() === 0 ){

    http_response_code(400);
    echo "Invalid data";
    die();
  };

  if (count($ERRORS) == 0) {
    $update_statement = $db->prepare("update response set responses = responses + 1 where  (id=:id and poll_id=:poll_id)");
    try {
      $update_statement->execute(array("id"=>$RESPONSE_ID, "poll_id"=>$POLL_ID));
    }
    catch (Exception $ex)
    {
      // Please be aware that you don't want to output the Exception message in
      // a production environment
      echo "Error with DB. Details: $ex";
      die();
    }
    $results_statement = $db->prepare("select name, responses from response where poll_id=:id");
    $results_statement->execute(array("id"=>$POLL_ID));
    echo json_encode($results_statement->fetchAll(PDO::FETCH_ASSOC));
    die();

  } else {
    print_r($ERRORS);
  }
} else {
  http_response_code(405);
  echo "Post only";
}

?>




