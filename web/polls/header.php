<?php
require 'dbConnect.php';
session_start();
$db = get_db();
if (isset($_SESSION['user_id'])) { 
    $_userStatement = $db->prepare("select id, username from user_ where id=".$_SESSION['user_id'].' limit 1'); 
    // we'll need to test if this fails silently 
    $_userStatement->execute(); 
    $USER = $_userStatement->fetch(PDO::FETCH_ASSOC); 
 
}    
?>